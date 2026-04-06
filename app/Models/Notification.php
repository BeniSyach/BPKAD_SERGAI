<?php
// app/Models/Notification.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'title',
        'body',
        'category',
        'category_label',
        'cat_class',
        'icon',
        'icon_bg',
        'nomor',
        'tanggal',
        'url',
        'is_read',
        'is_active',
    ];

    protected $casts = [
        'is_read'   => 'boolean',
        'is_active' => 'boolean',
        'tanggal'   => 'date',
    ];

    // ─── Scopes ───────────────────────────────────

    /** Hanya notifikasi yang aktif */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /** Hanya yang belum dibaca */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /** Filter berdasarkan kategori */
    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    // ─── Accessors ────────────────────────────────

    /** Waktu relatif: "5 menit lalu", "kemarin", dll */
    public function getCreatedAtHumanAttribute(): string
    {
        return Carbon::parse($this->created_at)
            ->locale('id')
            ->diffForHumans();
    }

    /** Tanggal dokumen format Indonesia: "14 Maret 2025" */
    public function getTanggalFormattedAttribute(): ?string
    {
        return $this->tanggal
            ? Carbon::parse($this->tanggal)->locale('id')->translatedFormat('d F Y')
            : null;
    }

    /** Potong body jadi excerpt */
    public function getExcerptAttribute(): string
    {
        return \Illuminate\Support\Str::limit(strip_tags($this->body ?? ''), 120);
    }

    // ─── Helper: to array untuk frontend ──────────

    public function toFrontendArray(): array
    {
        return [
            'id'             => $this->id,
            'title'          => $this->title,
            'excerpt'        => $this->excerpt,
            'body'           => $this->body,
            'category'       => $this->category,
            'category_label' => $this->category_label ?? ucfirst($this->category),
            'cat_class'      => $this->cat_class,
            'icon'           => $this->icon,
            'icon_bg'        => $this->icon_bg,
            'nomor'          => $this->nomor,
            'tanggal'        => $this->tanggal_formatted,
            'is_read'        => $this->is_read,
            'created_at_human' => $this->created_at_human,
            'url'            => $this->url,
        ];
    }
}