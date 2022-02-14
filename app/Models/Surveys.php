<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveys extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surveyId',
        'title',
        'slug',
        'author',
        'content',
        'published',
    ];

    protected $casts = [
        'content' => 'array'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'publishDate',
        'expireDate'
    ];

    public function getPublishDateForHumansAttribute() 
    {
        return $this->publishDate->format('M d, Y');
    }

    public function getPublishDateTimeForHumansAttribute() 
    {
        return $this->publishDate->format('M d, Y g:ia');
    }

    use HasFactory;
}
