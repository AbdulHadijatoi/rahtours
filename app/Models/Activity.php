<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Activity extends Model
{
    use HasFactory;

    public const UPLOADS_IMAGE_PATH = 'uploads/';

    public const DEFAULT_IMAGE_PATH = '../../assets/images/';

    public const DEFAULT_IMAGE_NAME = '5.jpg';

    protected $guarded = [];

    protected $casts = [
        'features' => 'array',
    ];

    protected $appends = ['image_url', 'average_rating', 'number_of_reviews'];

    protected function imagePath(): Attribute
    {
        $path = '';
        $filePath = self::UPLOADS_IMAGE_PATH.$this->image;
        if (Storage::disk('public')->exists($filePath) && ! empty($this->image)) {
            $path = asset('storage/'.self::UPLOADS_IMAGE_PATH.$this->image);
        }

        return new Attribute(function () use ($path) {
            return $path;
        });
    }

    public function getImageUrlAttribute()
    {
        return $this->imagePath;
    }

    protected function imagePathWithDefault(): Attribute
    {
        $path = $this->image;
        $checker = true;
        if (! empty($path)) {
            if (filter_var($path, FILTER_VALIDATE_URL)) {
                $headers = get_headers($path);
                if ($headers && strpos($headers[0], '200')) {
                    $checker = false;
                }
            }
            $imagePath = self::UPLOADS_IMAGE_PATH;
            if (Storage::disk('public')->exists($imagePath.$path) && $checker == true) {
                $path = asset('storage/'.$imagePath.$path);
            }
        }
        if (empty($path)) {
            $path = self::DEFAULT_IMAGE_PATH.self::DEFAULT_IMAGE_NAME;
        }

        return new Attribute(function () use ($path) {
            return $path;
        });

    }

    protected $with = ['ActivityImages', 'packages', 'reviews', 'instructions'];

    public function scopeActivity($query, $data)
    {

        $activity = new Activity([
            'slug' => $data['slug'],
            'page_title' => $data['page_title'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'duration' => $data['duration'],
            'cancellation_duration' => $data['cancellation_duration'],
            'description' => $data['description'],
            'highlights' => $data['highlights'],
            'itinerary' => $data['itinerary'],
            'subcategory_id' => $data['subcategory_id'],
            'whats_included' => $data['whats_included'],
            'whats_not_included' => $data['whats_not_included'],
            'minimum_travelers' => $data['minimum_travelers'],
            'features' => $data['features'],
            'booking_count' => $data['booking_count'] ?? 0,
            'discount_offer' => $data['discount_offer'] ?? 0,
            'most_popular_activity' => $data['most_popular_activity'] ?? 0,
            'otherexpereience_activity' => $data['otherexpereience_activity'] ?? 0,
            'home_activity' => $data['home_activity'] ?? 0,
            'home_experience_activity' => $data['home_experience_activity'] ?? 0,
            'available_activity' => $data['available_activity'] ?? 0,
            'start_time' => $data['start_time'],
        ]);

        $activity->save();

        return $activity;
    }

    public function scopeactivityUpdate($query, $userId, $data)
    {
        $activity = $query->find($userId);
        $activity->fill([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'duration' => $data['duration'],
            'cancellation_duration' => $data['cancellation_duration'],
            'description' => $data['description'],
            'highlights' => $data['highlights'],
            'itinerary' => $data['itinerary'],
            'subcategory_id' => $data['subcategory_id'],
            'whats_included' => $data['whats_included'],
            'whats_not_included' => $data['whats_not_included'],
            'minimum_travelers' => $data['minimum_travelers'],
            'features' => $data['features'],
            'booking_count' => $data['booking_count'] ?? $activity->booking_count,
            'discount_offer' => $data['discount_offer'] ?? $activity->discount_offer,
            'most_popular_activity' => $data['most_popular_activity'] ?? $activity->most_popular_activity,
            'otherexpereience_activity' => $data['otherexpereience_activity'] ?? $activity->otherexpereience_activity,
            'home_activity' => $data['home_activity'] ?? $activity->home_activity,
            'home_experience_activity' => $data['home_experience_activity'] ?? $activity->home_experience_activity,
            'available_activity' => $data['available_activity'] ?? $activity->available_activity,
            'start_time' => $data['start_time'] ?? $activity->start_time,
            'slug' => $data['slug'] ?? $activity->slug,
            'page_title' => $data['page_title'] ?? $activity->page_title,
        ]);

        $activity->save();

        return $activity;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function ActivityImages()
    {
        return $this->hasMany(ActivityPicture::class, 'activity_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // public function calculateReviewStats()
    // {

    //     $reviews = $this->reviews(); // Get the related reviews

    //     // Calculate the average rating, handle the case when there are no reviews
    //     $averageRating = $reviews->avg('rating') ?? 0;

    //     // Get the number of reviews
    //     $numberOfReviews = $reviews->count();

    //     // Return both values as an array
    //     return [
    //         'average_rating' => round($averageRating, 1), // Round the average to 1 decimal place
    //         'number_of_reviews' => $numberOfReviews,
    //     ];
    // }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function scopeUpdateImageName($query, $userId, $data)
    {
        $user = $query->findOrFail($userId);
        $user->fill(['image' => $data['image']]);
        $user->save();

        return $user;
    }

    public function giftCard()
    {
        return $this->hasMany(GiftCard::class);
    }

    public function instructions()
    {
        return $this->hasMany(ActivityInstruction::class);
    }

    // Accessor for average rating
    public function getAverageRatingAttribute()
    {
        $reviews = $this->reviews();
        return round($reviews->avg('rating'), 1) ?? 0; // Default to 0 if no reviews
    }

    // Accessor for number of reviews
    public function getNumberOfReviewsAttribute()
    {
        return $this->reviews()->count();
    }
}
