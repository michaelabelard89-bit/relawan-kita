<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model {
    use HasFactory;

    protected $table = 'events';
    protected $fillable = [
        'title','description','category','location',
        'event_date','event_time','organizer','requirements',
        'image_url','status','user_id'
    ];
    protected $casts = ['event_date' => 'date'];

    public function registrations() { return $this->hasMany(Registration::class); }
    public function user() { return $this->belongsTo(User::class); }

    public function getFormattedDateAttribute(): string {
        return $this->event_date->format('d F Y');
    }
    public function getFormattedTimeAttribute(): string {
        return Carbon::parse($this->event_time)->format('H:i');
    }
    public function getRegistrantCountAttribute(): int {
        return $this->registrations()->count();
    }
    public function scopeApproved($query) {
        return $query->where('status', 'approved');
    }
}