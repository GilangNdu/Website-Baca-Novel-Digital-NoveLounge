@extends('layouts.app')
@section('title', 'Edit Novel | NoveLounge')

@section('content')
<div class="edit-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-title">
                <h1>Edit Novel</h1>
                <p class="novel-title">{{ $novel->judul }}</p>
            </div>
            <a href="{{ url('/novel') }}" class="back-button">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5"/>
                    <path d="M12 19l-7-7 7-7"/>
                </svg>
                Kembali ke Daftar
            </a>
        </div>
        <div class="header-subtitle">
            <p>Perbarui informasi novel di bawah ini</p>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="edit-form-card">
        <form action="{{ url('/novel/update/' . $novel->id_novel) }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="novel-edit-form">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="form-section">
                <h3 class="section-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Informasi Dasar
                </h3>
                
                <div class="form-grid">
                    <!-- Judul -->
                    <div class="form-group">
                        <label class="form-label">
                            Judul Novel
                            <span class="required">*</span>
                        </label>
                        <input type="text" 
                               name="judul" 
                               class="form-input"
                               value="{{ old('judul', $novel->judul) }}"
                               required
                               placeholder="Masukkan judul novel">
                        <div class="form-hint">Judul utama novel</div>
                    </div>

                    <!-- Penulis -->
                    <div class="form-group">
                        <label class="form-label">
                            Penulis
                            <span class="required">*</span>
                        </label>
                        <input type="text" 
                               name="penulis" 
                               class="form-input"
                               value="{{ old('penulis', $novel->penulis) }}"
                               required
                               placeholder="Masukkan nama penulis">
                        <div class="form-hint">Nama pengarang novel</div>
                    </div>

                    <!-- Kategori -->
                    <div class="form-group">
                        <label class="form-label">
                            Kategori
                            <span class="required">*</span>
                        </label>
                        <div class="select-wrapper">
                            <select name="kategori" class="form-select" required>
                                <option value="" disabled>Pilih kategori</option>
                                <option value="Romantis" {{ $novel->kategori == 'Romantis' ? 'selected' : '' }}>Romantis</option>
                                <option value="Komedi" {{ $novel->kategori == 'Komedi' ? 'selected' : '' }}>Komedi</option>
                                <option value="Fantasi" {{ $novel->kategori == 'Fantasi' ? 'selected' : '' }}>Fantasi</option>
                                <option value="Action" {{ $novel->kategori == 'Action' ? 'selected' : '' }}>Action</option>
                            </select>
                            <svg class="select-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </div>
                        <div class="form-hint">Pilih kategori yang sesuai</div>
                    </div>

                    <!-- Cover -->
                    <div class="form-group">
                        <label class="form-label">
                            Cover Novel
                        </label>
                        <div class="cover-section">
                            <!-- Current Cover -->
                            <div class="current-cover">
                                <p class="cover-label">Cover Saat Ini:</p>
                                <div class="cover-preview">
                                    <img src="{{ asset('cover/' . $novel->cover) }}" 
                                         alt="{{ $novel->judul }}"
                                         class="cover-image">
                                    <div class="cover-overlay">
                                        <span>Preview</span>
                                    </div>
                                </div>
                            </div>

                            <!-- New Cover Upload -->
                            <div class="cover-upload">
                                <p class="cover-label">Ubah Cover (Opsional):</p>
                                <div class="file-upload">
                                    <input type="file" 
                                           name="cover" 
                                           id="cover-upload" 
                                           accept="image/*"
                                           class="file-input"
                                           onchange="previewNewCover(event)">
                                    <label for="cover-upload" class="file-label">
                                        <svg class="upload-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2 2v-4"/>
                                            <polyline points="17 8 12 3 7 8"/>
                                            <line x1="12" y1="3" x2="12" y2="15"/>
                                        </svg>
                                        <span class="file-text">Pilih file baru</span>
                                        <span class="file-hint">JPG, PNG (Max 2MB)</span>
                                    </label>
                                </div>
                                
                                <!-- New Cover Preview -->
                                <div class="new-cover-preview" id="new-cover-preview">
                                    <div class="preview-placeholder">
                                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                                            <circle cx="8.5" cy="8.5" r="1.5"/>
                                            <path d="M21 15l-5-5L5 21"/>
                                        </svg>
                                        <p>Preview cover baru</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-hint">Biarkan kosong jika tidak ingin mengganti cover</div>
                    </div>
                </div>
            </div>

            <!-- Synopsis -->
            <div class="form-section">
                <h3 class="section-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                    Sinopsis
                </h3>
                
                <div class="form-group">
                    <label class="form-label">
                        Sinopsis Singkat
                        <span class="required">*</span>
                    </label>
                    <textarea name="sinopsis" 
                              class="form-textarea medium"
                              required 
                              placeholder="Tulis sinopsis singkat yang menarik..."
                              rows="4">{{ old('sinopsis', $novel->sinopsis) }}</textarea>
                    <div class="form-hint">Ringkasan cerita (max 500 karakter)</div>
                    <div class="char-count">
                        <span id="sinopsis-count">{{ strlen($novel->sinopsis) }}</span>/500 karakter
                    </div>
                </div>
            </div>

            <!-- Full Story -->
            <div class="form-section">
                <h3 class="section-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                    Cerita Lengkap
                </h3>
                
                <div class="form-group">
                    <label class="form-label">
                        Isi Cerita
                        <span class="required">*</span>
                    </label>
                    <textarea name="cerita_lengkap" 
                              class="form-textarea large"
                              required 
                              placeholder="Tulis cerita lengkap di sini..."
                              rows="10">{{ old('cerita_lengkap', $novel->cerita_lengkap) }}</textarea>
                    <div class="form-hint">Isi lengkap novel</div>
                    <div class="char-count">
                        <span id="story-count">{{ strlen($novel->cerita_lengkap) }}</span> karakter
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <a href="{{ url('/novel') }}" class="btn-cancel">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5"/>
                        <path d="M12 19l-7-7 7-7"/>
                    </svg>
                    Batal
                </a>
                <div class="action-buttons">
                    <button type="reset" class="btn-secondary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/>
                            <path d="M21 3v5h-5"/>
                        </svg>
                        Reset
                    </button>
                    <button type="submit" class="btn-primary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                            <polyline points="17 21 17 13 7 13 7 21"/>
                            <polyline points="7 3 7 8 15 8"/>
                        </svg>
                        Update Novel
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Success Notification -->
    @if (session('success'))
    <div class="notification success" id="success-notification">
        <div class="notification-content">
            <svg class="notification-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            <div class="notification-text">
                <strong>Berhasil!</strong>
                <p>{{ session('success') }}</p>
            </div>
        </div>
        <button class="notification-close" onclick="closeNotification()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 6L6 18"/>
                <path d="M6 6l12 12"/>
            </svg>
        </button>
    </div>
    <script>
        setTimeout(() => {
            const notification = document.getElementById('success-notification');
            if (notification) {
                notification.classList.add('show');
                setTimeout(() => {
                    notification.classList.remove('show');
                }, 5000);
            }
        }, 100);
    </script>
    @endif
</div>

<style>
/* Container */
.edit-container {
    padding: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

/* Page Header */
.page-header {
    margin-bottom: 30px;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
    flex-wrap: wrap;
    gap: 20px;
}

.header-title h1 {
    font-size: 28px;
    font-weight: 700;
    color: #1e293b;
    margin: 0 0 4px 0;
}

.novel-title {
    font-size: 18px;
    color: #3b82f6;
    font-weight: 600;
    margin: 0;
    padding-left: 4px;
}

.header-subtitle p {
    font-size: 16px;
    color: #64748b;
    margin: 0;
}

.back-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: #f1f5f9;
    color: #475569;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.2s ease;
    border: 1px solid #e2e8f0;
}

.back-button:hover {
    background: #e2e8f0;
    transform: translateX(-2px);
}

/* Form Card */
.edit-form-card {
    background: white;
    border-radius: 16px;
    padding: 40px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
    border: 1px solid #e2e8f0;
}

/* Form Sections */
.form-section {
    margin-bottom: 40px;
    padding-bottom: 40px;
    border-bottom: 1px solid #f1f5f9;
}

.form-section:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.section-title {
    font-size: 18px;
    font-weight: 600;
    color: #1e293b;
    margin: 0 0 24px 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-title svg {
    color: #3b82f6;
}

/* Grid Layout */
.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
}

/* Form Groups */
.form-group {
    margin-bottom: 20px;
}

.form-group.full {
    grid-column: 1 / -1;
}

.form-label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
}

.required {
    color: #ef4444;
}

.form-hint {
    font-size: 12px;
    color: #6b7280;
    margin-top: 6px;
}

/* Inputs */
.form-input,
.form-select,
.form-textarea {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 14px;
    color: #374151;
    background: white;
    transition: all 0.2s ease;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-input::placeholder,
.form-textarea::placeholder {
    color: #9ca3af;
}

/* Select Styling */
.select-wrapper {
    position: relative;
}

.select-arrow {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    color: #6b7280;
}

.form-select {
    appearance: none;
    cursor: pointer;
}

/* Cover Section */
.cover-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .cover-section {
        grid-template-columns: 1fr;
    }
}

.cover-label {
    font-size: 14px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 12px;
}

.current-cover, .cover-upload {
    background: #f9fafb;
    border-radius: 12px;
    padding: 20px;
    border: 1px solid #e5e7eb;
}

.cover-preview {
    position: relative;
    width: 100%;
    height: 200px;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 16px;
}

.cover-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cover-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 8px;
    text-align: center;
    font-size: 12px;
    font-weight: 500;
}

/* File Upload */
.file-upload {
    margin-bottom: 20px;
}

.file-input {
    display: none;
}

.file-label {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 24px;
    border: 2px dashed #d1d5db;
    border-radius: 8px;
    background: #f9fafb;
    cursor: pointer;
    transition: all 0.2s ease;
    text-align: center;
}

.file-label:hover {
    border-color: #3b82f6;
    background: #f0f9ff;
}

.upload-icon {
    color: #6b7280;
    margin-bottom: 12px;
}

.file-text {
    font-size: 14px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 4px;
}

.file-hint {
    font-size: 12px;
    color: #6b7280;
}

/* New Cover Preview */
.new-cover-preview {
    width: 100%;
    height: 150px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    overflow: hidden;
    background: #f9fafb;
}

.preview-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: #9ca3af;
}

.preview-placeholder svg {
    margin-bottom: 8px;
}

.preview-placeholder p {
    margin: 0;
    font-size: 12px;
}

/* Textareas */
.form-textarea.medium {
    min-height: 120px;
    resize: vertical;
}

.form-textarea.large {
    min-height: 300px;
    resize: vertical;
}

/* Character Count */
.char-count {
    text-align: right;
    font-size: 12px;
    color: #6b7280;
    margin-top: 6px;
}

.char-count span {
    font-weight: 600;
    color: #374151;
}

/* Form Actions */
.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 40px;
    padding-top: 30px;
    border-top: 1px solid #f1f5f9;
    flex-wrap: wrap;
    gap: 16px;
}

.btn-cancel {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: #f1f5f9;
    color: #475569;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.2s ease;
    border: 1px solid #e2e8f0;
}

.btn-cancel:hover {
    background: #e2e8f0;
}

.action-buttons {
    display: flex;
    gap: 12px;
}

.btn-primary,
.btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 24px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
}

.btn-primary {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
}

.btn-secondary {
    background: white;
    color: #475569;
    border: 1px solid #d1d5db;
}

.btn-secondary:hover {
    background: #f9fafb;
    border-color: #9ca3af;
}

/* Notification */
.notification {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    border-left: 4px solid #10b981;
    transform: translateY(100px);
    opacity: 0;
    transition: all 0.3s ease;
    z-index: 1000;
    min-width: 300px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
}

.notification.show {
    transform: translateY(0);
    opacity: 1;
}

.notification.success {
    border-left-color: #10b981;
}

.notification-content {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1;
}

.notification-icon {
    color: #10b981;
    flex-shrink: 0;
}

.notification-text strong {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 2px;
}

.notification-text p {
    font-size: 13px;
    color: #64748b;
    margin: 0;
}

.notification-close {
    background: none;
    border: none;
    color: #9ca3af;
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    transition: all 0.2s ease;
}

.notification-close:hover {
    background: #f1f5f9;
    color: #64748b;
}

/* Responsive */
@media (max-width: 768px) {
    .edit-container {
        padding: 20px;
    }
    
    .edit-form-card {
        padding: 24px;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .form-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .action-buttons {
        width: 100%;
    }
    
    .btn-primary,
    .btn-secondary {
        flex: 1;
        justify-content: center;
    }
    
    .notification {
        left: 20px;
        right: 20px;
        bottom: 20px;
        min-width: auto;
    }
}

@media (max-width: 480px) {
    .header-title h1 {
        font-size: 24px;
    }
    
    .form-section {
        margin-bottom: 30px;
        padding-bottom: 30px;
    }
    
    .cover-section {
        gap: 20px;
    }
}
</style>

<script>
// Preview new cover
function previewNewCover(event) {
    const input = event.target;
    const preview = document.getElementById('new-cover-preview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.innerHTML = `
                <img src="${e.target.result}" 
                     alt="Preview Cover Baru" 
                     style="width:100%; height:150px; object-fit:cover; border-radius:8px;">
            `;
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

// Character count for sinopsis
const sinopsisTextarea = document.querySelector('textarea[name="sinopsis"]');
const sinopsisCount = document.getElementById('sinopsis-count');

sinopsisTextarea.addEventListener('input', function() {
    sinopsisCount.textContent = this.value.length;
});

// Character count for story
const storyTextarea = document.querySelector('textarea[name="cerita_lengkap"]');
const storyCount = document.getElementById('story-count');

storyTextarea.addEventListener('input', function() {
    storyCount.textContent = this.value.length;
});

// Close notification
function closeNotification() {
    const notification = document.getElementById('success-notification');
    if (notification) {
        notification.classList.remove('show');
    }
}
</script>
@endsection