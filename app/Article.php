<?php namespace App;

use Illuminate\Database\Eloquent\Model;
Use Carbon\Carbon;

class Article extends Model {

	protected $fillable = [
		'title',
		'body',
		'published_at',
	];

	protected $dates = ['published_at'];

	// scopeName
	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());

	}
	
	public function scopeUnpublished($query)
		{
			$query->where('published_at', '>', Carbon::now());

		}

	// setNameAttribute
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::parse($date);
	}

	public function getPublishedAtAttribute($date)
	{
		return Carbon::parse($date)->format('Y-m-d');
	}

	/**
	 * An article is owned by a user
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\user');
	}

	/**
	 * Get the taq associated with the given article
	 * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}

	/**
	 * Get a list of tag ids associated with current article
	 * @return [type] [description]
	 */
	public function getTagListAttribute()
	{
		return $this->tags->lists('id');
	}
}
