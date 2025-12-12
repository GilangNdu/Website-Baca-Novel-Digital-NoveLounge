@extends('layouts.app')
@section('title','Daftar Novel - NoveLounge')

@section('content')
    <div class="dashboard-container">
        <!-- Header Section -->
        <div class="dashboard-header">
            <div class="header-content">
                <h1 class="page-title">Daftar Novel</h1>
                <p class="page-description">Kelola koleksi novel Anda di NoveLounge</p>
            </div>
            <div class="header-actions">
                <button type="button" 
                        onclick="location.href='{{ url('/novel/cetak') }}'" 
                        class="btn-secondary">
                    <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    Cetak PDF
                </button>
                <button type="button" 
                        onclick="location.href='{{ url('/novel/tambah') }}'" 
                        class="btn-primary">
                    <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Novel
                </button>
            </div>
        </div>

        <!-- Stats Card -->
        <div class="stats-grid">
            <div class="stats-card">
                <div class="stats-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="stats-content">
                    <p class="stats-label">Total Novel</p>
                    <h3 class="stats-value">{{ $novels->count() }}</h3>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <div class="table-header">
                <h3 class="table-title">Koleksi Novel</h3>
                <div class="table-actions">
                    <div class="search-box">
                        <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" placeholder="Cari novel..." class="search-input">
                    </div>
                </div>
            </div>

            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <span class="table-header-text">Cover</span>
                            </th>
                            <th>
                                <span class="table-header-text">Judul</span>
                            </th>
                            <th>
                                <span class="table-header-text">Penulis</span>
                            </th>
                            <th>
                                <span class="table-header-text">Kategori</span>
                            </th>
                            <th>
                                <span class="table-header-text">Sinopsis</span>
                            </th>
                            <th class="text-center">
                                <span class="table-header-text">Aksi</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($novels as $data)
                        <tr class="table-row">
                            <td class="cover-cell">
                                <div class="cover-container">
                                    <img src="{{ asset('cover/'.$data->cover) }}" 
                                         alt="Cover {{ $data->judul }}" 
                                         class="novel-cover"
                                         onerror="this.src='https://via.placeholder.com/60x80?text=No+Cover'">
                                    <div class="cover-overlay"></div>
                                </div>
                            </td>
                            <td>
                                <div class="novel-title">{{ $data->judul }}</div>
                            </td>
                            <td>
                                <div class="novel-author">{{ $data->penulis }}</div>
                            </td>
                            <td>
                                <span class="category-badge">{{ $data->kategori }}</span>
                            </td>
                            <td>
                                <div class="synopsis-text" title="{{ $data->sinopsis }}">
                                    {{ Str::limit($data->sinopsis, 80) }}
                                </div>
                            </td>
                            <td class="action-cell">
                                <div class="action-buttons">
                                    <a href="{{ url('/novel/edit/' . $data->id_novel) }}" 
                                       class="action-btn edit-btn">
                                        <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ url('/novel/delete/' . $data->id_novel) }}" 
                                          method="POST"
                                          class="action-form"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus novel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn">
                                            <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="empty-state">
                                <div class="empty-content">
                                    <svg class="empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    <h4>Belum Ada Data Novel</h4>
                                    <p>Mulai dengan menambahkan novel pertama Anda</p>
                                    <button type="button" 
                                            onclick="location.href='{{ url('/novel/tambah') }}'" 
                                            class="btn-primary empty-btn">
                                        <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                        Tambah Novel Pertama
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        /* Base Styles */
        .dashboard-container {
            padding: 30px;
            background: #f8fafc;
            min-height: 100vh;
        }

        /* Header Styles */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-content {
            flex: 1;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 8px 0;
            line-height: 1.2;
        }

        .page-description {
            font-size: 16px;
            color: #64748b;
            margin: 0;
        }

        .header-actions {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        /* Button Styles */
        .btn-primary, .btn-secondary {
            display: inline-flex;
            align-items: center;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            gap: 8px;
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
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .btn-secondary:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            transform: translateY(-2px);
        }

        .btn-icon {
            width: 20px;
            height: 20px;
        }

        /* Stats Card */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stats-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
            transition: transform 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-4px);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #dbeafe 0%, #93c5fd 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1d4ed8;
        }

        .stats-icon svg {
            width: 30px;
            height: 30px;
        }

        .stats-content {
            flex: 1;
        }

        .stats-label {
            font-size: 14px;
            color: #64748b;
            font-weight: 500;
            margin: 0 0 4px 0;
        }

        .stats-value {
            font-size: 32px;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        /* Table Container */
        .table-container {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
        }

        .table-header {
            padding: 24px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .table-title {
            font-size: 20px;
            font-weight: 600;
            color: #1e293b;
            margin: 0;
        }

        .search-box {
            position: relative;
            min-width: 250px;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            color: #94a3b8;
        }

        .search-input {
            width: 100%;
            padding: 10px 12px 10px 40px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            background: #f8fafc;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Table Styles */
        .table-wrapper {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .data-table thead {
            background: #f8fafc;
        }

        .data-table th {
            padding: 18px 20px;
            text-align: left;
            font-weight: 600;
            color: #475569;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e2e8f0;
        }

        .data-table tbody tr {
            transition: background-color 0.2s ease;
        }

        .data-table tbody tr:hover {
            background-color: #f8fafc;
        }

        .data-table td {
            padding: 20px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .text-center {
            text-align: center;
        }

        /* Cover Cell */
        .cover-cell {
            width: 80px;
        }

        .cover-container {
            width: 60px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        .novel-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .cover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, transparent 70%, rgba(0,0,0,0.1) 100%);
        }

        .cover-container:hover .novel-cover {
            transform: scale(1.05);
        }

        /* Novel Info */
        .novel-title {
            font-weight: 600;
            color: #1e293b;
            font-size: 15px;
            margin-bottom: 4px;
        }

        .novel-author {
            color: #64748b;
            font-size: 14px;
        }

        /* Category Badge */
        .category-badge {
            display: inline-block;
            padding: 6px 12px;
            background: #e0e7ff;
            color: #4f46e5;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid #c7d2fe;
        }

        /* Synopsis */
        .synopsis-text {
            color: #64748b;
            font-size: 14px;
            line-height: 1.5;
            max-width: 300px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Action Buttons */
        .action-cell {
            width: 180px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .action-form {
            display: contents;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .edit-btn {
            background: #10b981;
            color: white;
        }

        .edit-btn:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        .delete-btn {
            background: #ef4444;
            color: white;
        }

        .delete-btn:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .action-icon {
            width: 16px;
            height: 16px;
        }

        /* Empty State */
        .empty-state {
            padding: 80px 20px;
        }

        .empty-content {
            text-align: center;
            max-width: 400px;
            margin: 0 auto;
        }

        .empty-icon {
            width: 80px;
            height: 80px;
            color: #cbd5e1;
            margin-bottom: 20px;
        }

        .empty-content h4 {
            font-size: 20px;
            font-weight: 600;
            color: #475569;
            margin: 0 0 8px 0;
        }

        .empty-content p {
            color: #94a3b8;
            margin: 0 0 24px 0;
        }

        .empty-btn {
            margin: 0 auto;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 20px;
            }

            .dashboard-header {
                flex-direction: column;
                gap: 16px;
            }

            .header-actions {
                width: 100%;
                justify-content: flex-start;
            }

            .table-header {
                flex-direction: column;
                align-items: stretch;
                gap: 16px;
            }

            .search-box {
                min-width: 100%;
            }

            .action-buttons {
                flex-direction: column;
                gap: 6px;
            }

            .action-btn {
                justify-content: center;
                width: 100%;
            }

            .stats-card {
                padding: 20px;
            }

            .stats-value {
                font-size: 28px;
            }
        }

        @media (max-width: 640px) {
            .data-table th:nth-child(4),
            .data-table td:nth-child(4) {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .data-table th:nth-child(3),
            .data-table td:nth-child(3),
            .data-table th:nth-child(5),
            .data-table td:nth-child(5) {
                display: none;
            }

            .btn-primary, .btn-secondary {
                padding: 10px 16px;
                font-size: 13px;
            }
        }
    </style>
@endsection