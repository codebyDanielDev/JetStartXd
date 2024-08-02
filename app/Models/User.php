<?php



namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use JoelButcher\Socialstream\HasConnectedAccounts;
use JoelButcher\Socialstream\SetsProfilePhotoFromUrl;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Firefly\FilamentBlog\Traits\HasBlog;

class User extends Authenticatable implements FilamentUser, MustVerifyEmail, HasAvatar
{
    use HasApiTokens;
    use HasConnectedAccounts;
    use HasFactory;
    use HasProfilePhoto {
        HasProfilePhoto::updateProfilePhoto as jetstreamUpdateProfilePhoto;
        HasProfilePhoto::deleteProfilePhoto as jetstreamDeleteProfilePhoto;
        HasProfilePhoto::defaultProfilePhotoUrl as jetstreamDefaultProfilePhotoUrl;
        HasProfilePhoto::profilePhotoUrl as getPhotoUrl;
        HasProfilePhoto::profilePhotoDisk as jetstreamProfilePhotoDisk;
    }
    use HasRoles;
    use HasBlog;
    use Notifiable;
    use SetsProfilePhotoFromUrl;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    /**
     * Get the URL to the user's profile photo.
     */
    public function profilePhotoUrl(): Attribute
    {
        return filter_var($this->profile_photo_path, FILTER_VALIDATE_URL)
            ? Attribute::get(fn () => $this->profile_photo_path)
            : $this->getPhotoUrl();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function canComment(): bool
    {
        // your conditional logic here
        return true;
    }

    public function getFilamentAvatarUrl(): string
    {
        return $this->profile_photo_url;
    }

    // Implementación de los métodos para resolver los conflictos
    public function updateProfilePhoto($photo)
    {
        $this->jetstreamUpdateProfilePhoto($photo);
    }

    public function deleteProfilePhoto()
    {
        $this->jetstreamDeleteProfilePhoto();
    }

    public function defaultProfilePhotoUrl()
    {
        return $this->jetstreamDefaultProfilePhotoUrl();
    }

    public function profilePhotoDisk()
    {
        return $this->jetstreamProfilePhotoDisk();
    }
}
