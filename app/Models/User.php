<?php

namespace App\Models;

use App\Models\UserWord;
use Carbon\CarbonInterval;
use App\Models\UserCategory;
use Illuminate\Support\Carbon;
use App\Models\UserSubcategory;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'level',
        'password',
        'role',
        'subcategory',
        'category',
        'language',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //User roles.
    public const ADMIN = 1;
    public const PREMIUM_USER = 2;
    public const USER = 3;

    public function role(): string
    {
        switch ($this->role) {
            case '1':
                return 'ADMIN';
                break;

            case '2':
                return 'PREMIUM_USER';
                break;

            case '3':
                return 'USER';
                break;
        }
    }

    public function level(): string
    {
        foreach(config('langgim.levels') as $key => $level)
        {
            if ($this->level === $key+1)
            {
                return $level;
            }
        }
    }

    public function timer(): string
    {
        return CarbonInterval::seconds($this->timer)->cascade()->forHumans(['short' => true]);
    }

    public function learnedWordsOnLevel(): string
    {
        $learnedWords = $this->userWords()->whereRelation('word', 'level', '<=', $this->level)->where('is_learned', '>', 2)->where('language', $this->language)->count();
        $wordsInLevel = Word::where('level', '<=', $this->level)->count();
        return $learnedWords . " / " . $wordsInLevel;
    }

    public function levelStatus(): int
    {
        $learnedWords = $this->userWords()->whereRelation('word', 'level', '<=', $this->level)->where('is_learned', '>', 2)->where('language', $this->language)->count();
        $wordsInLevel = Word::where('level', '<=', $this->level)->count();
        return round(($learnedWords  / $wordsInLevel) * 100);
    }

    public function categoryLearnedWords(int $categoryId): int
    {
        $learnedWords =
            $this
            ->userWords()
            ->where('is_learned', '>', 2)
            ->where('language', $this->language)
            ->whereRelation('word', 'category_id', $categoryId)
            ->count();

        return $learnedWords;
    }

    public function subcategoryLearnedWords(int $subcategoryId): int
    {
        $learnedWords =
            $this
            ->userWords()
            ->whereRelation('word', 'level', '<=', $this->level)
            ->whereRelation('word', 'subcategory_id', $subcategoryId)
            ->where('is_learned', '>', 2)
            ->where('language', $this->language)
            ->count();

        return $learnedWords;
    }

    public function userWords(): HasMany
    {
        return $this->hasMany(UserWord::class);
    }

    public function userQuizWords(): HasMany
    {
        return $this->hasMany(UserQuizWord::class);
    }

    public function userCategories(): HasMany
    {
        return $this->hasMany(UserCategory::class);
    }

    public function userSubcategories(): HasMany
    {
        return $this->hasMany(UserSubcategory::class);
    }

    public function isAdmin(): bool
    {
        return $this->role == self::ADMIN ? true : false;
    }

    public function isPremiumUser(): bool
    {
        return $this->role <= self::PREMIUM_USER ? true : false;
    }

    public function isUser(): bool
    {
        return $this->role <= self::USER ? true : false;
    }

    public function createdAt(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d');
    }

}
