<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NAWM Admin</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;
</script>
<style>
  :root {
    --bg: #f5f4f0;
    --surface: #ffffff;
    --sidebar: #0f0f0f;
    --sidebar-text: #a0a0a0;
    --sidebar-active: #ffffff;
    --accent: #c8a96e;
    --accent2: #8b2020;
    --text: #1a1a1a;
    --text-muted: #888;
    --border: #e8e6e0;
    --danger: #c0392b;
    --success: #27ae60;
    --warning: #e67e22;
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    display: flex;
    min-height: 100vh;
  }

  .sidebar {
    width: 240px;
    background: var(--sidebar);
    min-height: 100vh;
    position: fixed;
    left: 0; top: 0;
    display: flex;
    flex-direction: column;
    z-index: 100;
    transition: transform 0.3s ease;
  }

  .sidebar-logo { padding: 28px 24px 20px; border-bottom: 1px solid #222; }
  .sidebar-logo .brand { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 13px; letter-spacing: 0.12em; text-transform: uppercase; color: var(--accent); line-height: 1.3; }
  .sidebar-logo .sub { font-size: 10px; color: #444; letter-spacing: 0.08em; text-transform: uppercase; margin-top: 2px; }

  .nav { padding: 20px 0; flex: 1; }
  .nav-label { font-size: 9px; letter-spacing: 0.15em; text-transform: uppercase; color: #333; padding: 16px 24px 8px; font-family: 'Syne', sans-serif; }

  .nav-item {
    display: flex; align-items: center; gap: 12px;
    padding: 11px 24px; cursor: pointer;
    color: var(--sidebar-text); font-size: 13.5px; font-weight: 400;
    transition: all 0.2s; border-left: 2px solid transparent; user-select: none;
  }
  .nav-item:hover { color: #ddd; background: #181818; }
  .nav-item.active { color: var(--sidebar-active); border-left-color: var(--accent); background: #181818; }
  .nav-item .icon { font-size: 15px; width: 18px; text-align: center; }
  .nav-item.disabled { opacity: 0.35; cursor: default; pointer-events: none; }

  .nav-badge { margin-left: auto; background: var(--accent2); color: #fff; font-size: 10px; padding: 1px 6px; border-radius: 10px; font-weight: 600; }
  .sidebar-footer { padding: 16px 24px; border-top: 1px solid #1a1a1a; font-size: 12px; color: #333; }

  .main { margin-left: 240px; flex: 1; min-height: 100vh; display: flex; flex-direction: column; }

  .topbar {
    background: var(--surface); border-bottom: 1px solid var(--border);
    padding: 0 32px; height: 60px;
    display: flex; align-items: center; justify-content: space-between;
    position: sticky; top: 0; z-index: 50;
  }
  .topbar-title { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 16px; letter-spacing: 0.02em; }
  .topbar-right { display: flex; align-items: center; gap: 16px; }
  .avatar { width: 34px; height: 34px; background: var(--accent); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; color: #fff; cursor: pointer; font-family: 'Syne', sans-serif; }
  .hamburger { display: none; background: none; border: none; cursor: pointer; font-size: 20px; color: var(--text); padding: 4px; }

  .content { padding: 32px; flex: 1; }

  .section { display: none; }
  .section.active { display: block; animation: fadeIn 0.25s ease; }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 28px; }
  .page-header h1 { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 22px; }

  .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px; }

  .stat-card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 22px 24px; position: relative; overflow: hidden; }
  .stat-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: var(--accent); }
  .stat-card:nth-child(2)::before { background: var(--accent2); }
  .stat-card:nth-child(3)::before { background: #2980b9; }
  .stat-card:nth-child(4)::before { background: var(--success); }
  .stat-label { font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 10px; font-family: 'Syne', sans-serif; }
  .stat-value { font-family: 'Syne', sans-serif; font-size: 32px; font-weight: 800; line-height: 1; }
  .stat-change { font-size: 12px; color: var(--success); margin-top: 6px; }

  .chart-card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 24px; margin-bottom: 28px; }
  .chart-card h3 { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 14px; margin-bottom: 20px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.08em; }

  .table-card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; overflow: hidden; }
  .table-card-header { padding: 18px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
  .table-card-header h3 { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 0.08em; color: var(--text-muted); }

  table { width: 100%; border-collapse: collapse; }
  th { text-align: left; padding: 12px 24px; font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--text-muted); background: #fafaf8; font-family: 'Syne', sans-serif; font-weight: 600; border-bottom: 1px solid var(--border); }
  td { padding: 14px 24px; font-size: 13.5px; border-bottom: 1px solid #f0ede8; vertical-align: middle; }
  tr:last-child td { border-bottom: none; }
  tr:hover td { background: #fafaf8; }

  .badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 500; font-family: 'Syne', sans-serif; }
  .badge-published { background: #e8f5e9; color: #2e7d32; }
  .badge-draft { background: #fff3e0; color: #e65100; }
  .badge-approved { background: #e8f5e9; color: #2e7d32; }
  .badge-pending { background: #fce4ec; color: #c62828; }
  .badge-admin { background: #0f0f0f; color: #c8a96e; }
  .badge-editor { background: #e3f2fd; color: #1565c0; }
  .badge-author { background: #f3e5f5; color: #6a1b9a; }

  .actions { display: flex; gap: 8px; }

  .btn { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 500; cursor: pointer; border: none; font-family: 'DM Sans', sans-serif; transition: all 0.15s; }
  .btn-primary { background: var(--sidebar); color: #fff; }
  .btn-primary:hover { background: #2a2a2a; }
  .btn-sm { padding: 5px 12px; font-size: 12px; border-radius: 6px; }
  .btn-ghost { background: none; border: 1px solid var(--border); color: var(--text); }
  .btn-ghost:hover { background: var(--bg); }
  .btn-danger { background: #fdecea; color: var(--danger); }
  .btn-danger:hover { background: #f5c6c2; }
  .btn-success { background: #e8f5e9; color: var(--success); }
  .btn-success:hover { background: #c8e6c9; }

  .filter-bar { display: flex; gap: 12px; margin-bottom: 20px; flex-wrap: wrap; }
  .search-input { flex: 1; min-width: 200px; padding: 9px 14px; border: 1px solid var(--border); border-radius: 8px; font-size: 13px; background: var(--surface); font-family: 'DM Sans', sans-serif; outline: none; transition: border-color 0.2s; }
  .search-input:focus { border-color: var(--accent); }
  select.filter-select { padding: 9px 14px; border: 1px solid var(--border); border-radius: 8px; font-size: 13px; background: var(--surface); font-family: 'DM Sans', sans-serif; outline: none; cursor: pointer; }

  .modal-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.5); display: none; align-items: center; justify-content: center; z-index: 200; backdrop-filter: blur(4px); }
  .modal-overlay.open { display: flex; }
  .modal { background: var(--surface); border-radius: 14px; padding: 32px; width: 90%; max-width: 520px; max-height: 90vh; overflow-y: auto; box-shadow: 0 20px 60px rgba(0,0,0,0.3); animation: modalIn 0.25s cubic-bezier(0.34,1.56,0.64,1); }
  @keyframes modalIn { from { opacity:0; transform: scale(0.92) translateY(16px); } to { opacity:1; transform: scale(1) translateY(0); } }
  .modal h2 { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 18px; margin-bottom: 24px; }
  .form-group { margin-bottom: 18px; }
  .form-group label { display: block; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.08em; color: var(--text-muted); margin-bottom: 6px; font-family: 'Syne', sans-serif; }
  .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 8px; font-size: 13.5px; font-family: 'DM Sans', sans-serif; background: var(--bg); outline: none; transition: border-color 0.2s; color: var(--text); }
  .form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: var(--accent); background: #fff; }
  .form-group textarea { resize: vertical; min-height: 100px; }
  .modal-actions { display: flex; gap: 10px; justify-content: flex-end; margin-top: 24px; }

  .toggle-wrap { display: flex; align-items: center; gap: 10px; }
  .toggle { position: relative; width: 40px; height: 22px; cursor: pointer; }
  .toggle input { opacity: 0; width: 0; height: 0; }
  .toggle-slider { position: absolute; inset: 0; background: #ddd; border-radius: 22px; transition: 0.3s; }
  .toggle-slider::before { content: ''; position: absolute; width: 16px; height: 16px; left: 3px; top: 3px; background: white; border-radius: 50%; transition: 0.3s; }
  .toggle input:checked + .toggle-slider { background: var(--accent); }
  .toggle input:checked + .toggle-slider::before { transform: translateX(18px); }

  .toast { position: fixed; bottom: 28px; right: 28px; background: var(--sidebar); color: #fff; padding: 14px 22px; border-radius: 10px; font-size: 13.5px; z-index: 999; transform: translateY(80px); opacity: 0; transition: all 0.3s ease; border-left: 3px solid var(--accent); font-family: 'DM Sans', sans-serif; }
  .toast.show { transform: translateY(0); opacity: 1; }

  .settings-card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 28px; max-width: 560px; margin-bottom: 20px; }
  .settings-card h3 { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 13px; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-muted); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--border); }

  .cat-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(190px, 1fr)); gap: 16px; margin-bottom: 28px; }
  .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 22px; transition: box-shadow 0.2s, transform 0.2s; }
  .cat-card:hover { box-shadow: 0 4px 20px rgba(0,0,0,0.07); transform: translateY(-2px); }

  .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 99; }

  @media (max-width: 768px) {
    .sidebar { transform: translateX(-100%); }
    .sidebar.open { transform: translateX(0); }
    .sidebar-overlay.open { display: block; }
    .main { margin-left: 0; }
    .hamburger { display: block; }
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
    .content { padding: 20px 16px; }
    .topbar { padding: 0 16px; }
    td, th { padding: 12px 16px; }
    .cat-grid { grid-template-columns: repeat(2, 1fr); }
  }

  @media (max-width: 480px) {
    .stats-grid { grid-template-columns: 1fr; }
    .cat-grid { grid-template-columns: 1fr; }
  }
</style>
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<aside class="sidebar" id="sidebar">
  <div class="sidebar-logo">
    <div class="brand">Nations at War</div>
    <div class="sub">Mobile — Admin Panel</div>
  </div>
  <nav class="nav">
    <div class="nav-label">მთავარი</div>
    <div class="nav-item active" onclick="navigate('dashboard', this)">
      <span class="icon">◈</span> დეშბორდი
    </div>
    <div class="nav-label">კონტენტი</div>
    <div class="nav-item" onclick="navigate('posts', this)">
      <span class="icon">◧</span> პოსტები
    </div>
    <div class="nav-item" onclick="navigate('comments', this)">
      <span class="icon">◫</span> კომენტარები
      <span class="nav-badge" id="pendingBadge">0</span>
    </div>
    <div class="nav-item" onclick="navigate('categories', this)">
      <span class="icon">◑</span> კატეგორიები
    </div>
    <div class="nav-label">მომხმარებლები</div>
    <div class="nav-item" onclick="navigate('users', this)">
      <span class="icon">◉</span> მომხმარებლები
    </div>
    <div class="nav-label">სხვა</div>
    <div class="nav-item disabled" title="მალე დაემატება">
      <span class="icon">⬡</span> ფორუმი
      <span class="nav-badge" style="background:#333;color:#555">Soon</span>
    </div>
    <div class="nav-item" onclick="navigate('settings', this)">
      <span class="icon">◎</span> პარამეტრები
    </div>
  </nav>
  <div class="sidebar-footer">v1.0.0 · NAWM Admin</div>
</aside>

<div class="main">
  <header class="topbar">
    <div style="display:flex;align-items:center;gap:14px">
      <button class="hamburger" onclick="toggleSidebar()">☰</button>
      <div class="topbar-title" id="topbarTitle">დეშბორდი</div>
    </div>
    <div class="topbar-right">
      <span style="font-size:12px;color:var(--text-muted)">Admin</span>
      <div class="avatar">A</div>
    </div>
  </header>

  <div class="content">

    <!-- DASHBOARD -->
    <div class="section active" id="sec-dashboard">
      <div class="page-header">
        <h1>მიმოხილვა</h1>
        <span style="font-size:12px;color:var(--text-muted)">ბოლო 7 დღე</span>
      </div>
      <div class="stats-grid">
        <div class="stat-card"><div class="stat-label">სულ პოსტი</div><div class="stat-value">0</div><div class="stat-change">0 ამ კვირას</div></div>
        <div class="stat-card"><div class="stat-label">კომენტარი</div><div class="stat-value">0</div><div class="stat-change">0 ამ კვირას</div></div>
        <div class="stat-card"><div class="stat-label">ნახვა</div><div class="stat-value">0</div><div class="stat-change">0 ამ კვირას</div></div>
        <div class="stat-card"><div class="stat-label">მომხმარებელი</div><div class="stat-value">0</div><div class="stat-change">0 ამ კვირას</div></div>
      </div>
      <div class="chart-card">
        <h3>ნახვები — ბოლო 7 დღე</h3>
        <canvas id="viewsChart" height="80"></canvas>
      </div>
      <div class="table-card">
        <div class="table-card-header"><h3>ბოლო პოსტები</h3></div>
        <table>
          <thead><tr><th>სათაური</th><th>კატეგორია</th><th>თარიღი</th><th>სტატუსი</th></tr></thead>
          <tbody id="dashRecentPosts"></tbody>
        </table>
      </div>
    </div>

    <!-- POSTS -->
    <div class="section" id="sec-posts">
      <div class="page-header">
        <h1>პოსტები</h1>
        <button class="btn btn-primary" onclick="openModal('postModal')">+ ახალი პოსტი</button>
      </div>
      <div class="filter-bar">
        <input class="search-input" placeholder="🔍  პოსტის ძებნა..." id="postSearch">
        <select class="filter-select" id="postStatusFilter">
          <option value="">ყველა სტატუსი</option>
          <option value="published">გამოქვეყნებული</option>
          <option value="draft">მონახაზი</option>
        </select>
      </div>
      <div class="table-card">
        <table>
          <thead><tr><th>სათაური</th><th>კატეგორია</th><th>თარიღი</th><th>სტატუსი</th><th>მოქმედება</th></tr></thead>
          <tbody id="postsTable"></tbody>
        </table>
      </div>
    </div>

    <!-- COMMENTS -->
    <div class="section" id="sec-comments">
      <div class="page-header"><h1>კომენტარები</h1></div>
      <div class="filter-bar">
        <select class="filter-select" id="commentFilter">
          <option value="">ყველა</option>
          <option value="pending">მოლოდინში</option>
          <option value="approved">დამტკიცებული</option>
        </select>
      </div>
      <div class="table-card">
        <table>
          <thead><tr><th>ავტორი</th><th>პოსტი</th><th>კომენტარი</th><th>სტატუსი</th><th>მოქმედება</th></tr></thead>
          <tbody id="commentsTable"></tbody>
        </table>
      </div>
    </div>

    <!-- CATEGORIES -->
    <div class="section" id="sec-categories">
      <div class="page-header">
        <h1>კატეგორიები</h1>
        <button class="btn btn-primary" onclick="openModal('categoryModal')">+ ახალი კატეგორია</button>
      </div>
      <div class="cat-grid" id="catGrid"></div>
      <div class="table-card">
        <div class="table-card-header"><h3>კატეგორიების სია</h3></div>
        <table>
          <thead><tr><th>#</th><th>სახელი</th><th>Slug</th><th>პოსტები</th><th>მოქმედება</th></tr></thead>
          <tbody id="categoriesTable"></tbody>
        </table>
      </div>
    </div>

    <!-- USERS -->
    <div class="section" id="sec-users">
      <div class="page-header">
        <h1>მომხმარებლები</h1>
        <button class="btn btn-primary" onclick="openModal('userModal')">+ ახალი</button>
      </div>
      <div class="table-card">
        <table>
          <thead><tr><th>სახელი</th><th>Email</th><th>როლი</th><th>შეუერთდა</th><th>მოქმედება</th></tr></thead>
          <tbody id="usersTable"></tbody>
        </table>
      </div>
    </div>

    <!-- SETTINGS -->
    <div class="section" id="sec-settings">
      <div class="page-header"><h1>პარამეტრები</h1></div>
      <div class="settings-card">
        <h3>საიტის ინფო</h3>
        <div class="form-group"><label>საიტის სახელი</label><input type="text" value="Nations at War Mobile"></div>
        <div class="form-group"><label>Tagline</label><input type="text" value="სტრატეგიული მობილური თამაშის ბლოგი"></div>
        <div class="form-group">
          <label>დროის ზონა</label>
          <select><option>Asia/Tbilisi (UTC+4)</option><option>Europe/London (UTC+0)</option><option>America/New_York (UTC-5)</option></select>
        </div>
      </div>
      <div class="settings-card">
        <h3>პოსტების პარამეტრები</h3>
        <div class="form-group"><label>პოსტი გვერდზე</label><input type="number" value="10" style="max-width:100px"></div>
        <div class="form-group">
          <label>კომენტარების ნებართვა</label>
          <div class="toggle-wrap">
            <label class="toggle"><input type="checkbox" checked><span class="toggle-slider"></span></label>
            <span style="font-size:13px">ჩართული</span>
          </div>
        </div>
      </div>
      <button class="btn btn-primary" onclick="showToast('✓ პარამეტრები შენახულია')">შენახვა</button>
    </div>

  </div>
</div>

<!-- POST MODAL -->
<div class="modal-overlay" id="postModal">
  <div class="modal">
    <h2>ახალი პოსტი</h2>
    <div class="form-group"><label>სათაური</label><input type="text" id="newPostTitle" placeholder="პოსტის სათაური"></div>
    <input id="file" type="file" name="file[]" multiple>
    <div class="form-group"><label>კატეგორია</label>
        <select id="newPostCat">

        </select>
    </div>
    <div class="form-group"><label>კონტენტი</label><textarea id="newPostContent" placeholder="პოსტის ტექსტი..."></textarea></div>
    <div class="form-group"><label>სტატუსი</label><select id="newPostStatus"><option value="published">გამოქვეყნება</option><option value="draft">მონახაზი</option></select></div>
    <div class="modal-actions">
      <button class="btn btn-ghost" onclick="closeModal('postModal')">გაუქმება</button>
      <button class="btn btn-primary" onclick="addPost()">შენახვა</button>
    </div>
  </div>
</div>

<!-- CATEGORY MODAL -->
<div class="modal-overlay" id="categoryModal">
  <div class="modal">
    <h2>ახალი კატეგორია</h2>
    <div class="form-group"><label>სახელი</label><input type="text" id="newCatName" placeholder="კატეგორიის სახელი"></div>
    <div class="form-group"><label>Slug</label><input type="text" id="newCatSlug" placeholder="category-slug"></div>
    <div class="modal-actions">
      <button class="btn btn-ghost" onclick="closeModal('categoryModal')">გაუქმება</button>
      <button class="btn btn-primary" onclick="addCategory()">შენახვა</button>
    </div>
  </div>
</div>

<!-- USER MODAL -->
<div class="modal-overlay" id="userModal">
  <div class="modal">
    <h2>ახალი მომხმარებელი</h2>
    <div class="form-group"><label>სახელი</label><input type="text" id="newUserName" placeholder="სახელი გვარი"></div>
    <div class="form-group"><label>Email</label><input type="email" id="newUserEmail" placeholder="mail@example.com"></div>
    <div class="form-group"><label>როლი</label>
        <select id="newUserRole">
            
        </select>
    </div>
    <div class="modal-actions">
      <button class="btn btn-ghost" onclick="closeModal('userModal')">გაუქმება</button>
      <button class="btn btn-primary" onclick="addUser()">დამატება</button>
    </div>
  </div>
</div>
<div class="modal-overlay" id="editPostModal">
  <div class="modal">
    <h2>პოსტის რედაქტირება</h2>
    <input type="hidden" id="editPostId">
    <div class="form-group">
      <label>სათაური</label>
      <input type="text" id="editPostTitle" placeholder="პოსტის სათაური">
    </div>
    <div class="form-group">
      <label>კატეგორია</label>
      <select id="editPostCat"></select>
    </div>
    <div class="form-group">
      <label>კონტენტი</label>
      <textarea id="editPostContent" placeholder="პოსტის ტექსტი..."></textarea>
    </div>
    <div class="form-group">
      <label>სტატუსი</label>
      <select id="editPostStatus">
        <option value="published">გამოქვეყნება</option>
        <option value="draft">მონახაზი</option>
      </select>
    </div>
    <div class="modal-actions">
      <button class="btn btn-ghost" onclick="closeModal('editPostModal')">გაუქმება</button>
      <button class="btn btn-primary" id="updatePostBtn" onclick="editPost()" >განახლება</button>
      <button class="btn btn-primary" id="updateCatBtn" onclick="deletePost()" >წაშლა</button>
    </div>
  </div>
</div>

<div class="modal-overlay" id="editCategoryModal">
  <div class="modal">
    <h2>კატეგორიის რედაქტირება</h2>
    <input type="hidden" id="editCatId">
    <div class="form-group">
      <label>სახელი</label>
      <input type="text" id="editCatName" placeholder="კატეგორიის სახელი">
    </div>
    <div class="form-group">
      <label>Slug</label>
      <input type="text" id="editCatSlug" placeholder="category-slug">
    </div>
    <div class="modal-actions">
      <button class="btn btn-ghost" onclick="closeModal('editCategoryModal')">გაუქმება</button>
      <button class="btn btn-primary" id="updateCatBtn" onclick="editCategory()" >განახლება</button>
      <button class="btn btn-primary" id="updateCatBtn" onclick="deleteCategory()" >წაშლა</button>
    </div>
  </div>
</div>

<div class="modal-overlay" id="editUserModal">
  <div class="modal">
    <h2>მომხმარებლის რედაქტირება</h2>
    <input type="hidden" id="editUserId">
    <div class="form-group">
      <label>სახელი</label>
      <input type="text" id="editUserName" placeholder="სახელი გვარი">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" id="editUserEmail" placeholder="mail@example.com">
    </div>
    <div class="form-group">
      <label>როლი</label>
      <select id="editUserRole"></select>
    </div>
    <div class="modal-actions">
      <button class="btn btn-ghost" onclick="closeModal('editUserModal')">გაუქმება</button>
      <button class="btn btn-primary" id="updateUserBtn">განახლება</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>

function getUser(){
    axios.get('/api/user')
    .then(res => {
        const user = res.data.users;
        const usersTable = document.getElementById('usersTable');
        console.log(user);
        user.forEach(u => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${u.name}</td><td>${u.email}</td><td><span class="badge badge-${u.role}">${u.role.name}</span></td><td>${new Date(u.created_at).toLocaleDateString()}</td><td><button class="btn btn-sm btn-ghost" onclick="openEditModal('user', ${u})">რედაქტირება</button></td>`;
            usersTable.appendChild(tr);
        })
        
    })
    .catch(err => {
        console.error(err);
        alert('მომხმარებლის ინფორმაციის მიღება ვერ მოხერხდა');
    });
}

function getRoles(){
    axios.get('/api/roles')
    .then(res => {
        console.log(res.data.roles);
        const roleSelect = document.getElementById('newUserRole');
        res.data.roles.forEach(role => {
            const option = document.createElement('option');
            option.value = role.id;
            option.textContent = role.name;
            roleSelect.appendChild(option);
        });
    })
    .catch(err => {
        console.error(err);
        alert('როლების ინფორმაციის მიღება ვერ მოხერხდა');
    });
}

function addPost() {
    const title = document.getElementById('newPostTitle').value.trim();
    const content = document.getElementById('newPostContent').value.trim();
    const category_id = document.getElementById('newPostCat').value;
    const status = document.getElementById('newPostStatus').value;
    const fileInput = document.getElementById('file');
    console.log(fileInput.files)
    if (!title || !content) return alert('გთხოვთ შეავსოთ ყველა ველი');

    let data = new FormData();
    
    for (let i = 0; i < fileInput.files.length; i++) {
        console.log(fileInput.files[i])
        data.append('file[]', fileInput.files[i]);
    }
    console.log(data)
    data.append('title', title);
    data.append('content', content);
    data.append('category_id', category_id);
    data.append('status', status);
    
    axios.post('/api/post', data, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(res => {
        showToast('✓ პოსტი დამატებულია');
        getPosts();
        closeModal('postModal');
    })
    .catch(err => {
        console.error(err.response.data);
        alert('პოსტის დამატება ვერ მოხერხდა');
    });
}

function editPost(){
  const title = document.getElementById('editPostTitle').value.trim();
  const content = document.getElementById('editPostContent').value.trim();
  const category_id = document.getElementById('editPostCat').value;
  const status = document.getElementById('editPostStatus').value;
  axios.patch(`/api/post/${document.getElementById('editPostId').value}`,{title, content, category_id, status})
  .then((res) => {
    showToast('✓ პოსტი დამატებულია');
    getPosts();
  }).catch((err) => {
    console.error(err);
    alert('პოსტის დამატება ვერ მოხერხდა');
  });
  closeModal('editPostModal');
}
function deletePost(){
  axios.delete(`/api/post/${document.getElementById('editPostId').value}`)
  .then((res) => {
    showToast('✓ პოსტი წაშლილია');
    getPosts();
  }).catch((err) => {
    console.error(err);
    alert('პოსტის წაშლა ვერ მოხერხდა');
  });
  closeModal('editPostModal');
}

var posts = []
function getPosts() {
    axios.get('/api/posts')
    .then(res => {
        const postsTable = document.getElementById('postsTable');
        postsTable.innerHTML = '';
        posts = res.data['posts'];
        res.data['posts'].forEach((post,index) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${post.title}</td><td>${post.category.title}</td><td>${new Date(post.created_at).toLocaleDateString()}</td><td><span class="badge badge-${post.status}">${post.status}</span></td><td><button class="btn btn-sm btn-ghost" onclick="openEditModal('post', ${index})">რედაქტირება</button></td>`;
            postsTable.appendChild(tr);
        });
    })
    .catch(err => {
        console.error(err);
        alert('პოსტების მიღება ვერ მოხერხდა');
    });
}

function addCategory(){
    const name = document.getElementById('newCatName').value.trim();
    const slug = document.getElementById('newCatSlug').value.trim();
    if(!name || !slug) return alert('გთხოვთ შეავსოთ ყველა ველი');
    axios.post('/api/categories', { name, slug })
    .then(res => {
        showToast('✓ კატეგორია დამატებულია');
        getCategories();
    })
    .catch(err => {
        console.error(err);
        alert('კატეგორიის დამატება ვერ მოხერხდა');
    });
    closeModal('categoryModal');
}

function editCategory(){
  const name = document.getElementById('editCatName').value.trim();
  const slug = document.getElementById('editCatSlug').value.trim();
  axios.patch(`/api/category/${document.getElementById('editCatId').value}`,{name,slug})
  .then((res) => {
    showToast('✓ კატეგორია დამატებულია');
    getCategories();
  }).catch((err) => {
      console.error(err);
      alert('კატეგორიის დამატება ვერ მოხერხდა');
  })
  closeModal('editCategoryModal')
}
function deleteCategory(){
  const name = document.getElementById('editCatName').value.trim();
  const slug = document.getElementById('editCatSlug').value.trim();
  axios.delete(`/api/category/${document.getElementById('editCatId').value}`)
  .then((res) => {
    showToast('✓ კატეგორია წაშლილია');
    getCategories();
  }).catch((err) => {
      console.error(err);
      alert('კატეგორიის წაშლა ვერ მოხერხდა');
  })
  closeModal('editCategoryModal')
}


var categories = []
function getCategories() {
    axios.get('/api/categories')
    .then(res => {
        const catGrid = document.getElementById('catGrid');
        const catTable = document.getElementById('categoriesTable');
        catGrid.innerHTML = '';
        catTable.innerHTML = '';
        categories = res.data['categories']
        res.data['categories'].forEach((cat, idx) => {
            const catCard = document.createElement('div');
            catCard.className = 'cat-card';
            catCard.innerHTML = `<strong>${cat.name}</strong><br><small style="
color:var(--text-muted)">${cat.slug}</small>`;
            catGrid.appendChild(catCard);
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${idx+1}</td><td>${cat.name}</td><td>${cat.slug}</td><td>${cat.posts_count}</td><td><button class="btn btn-sm btn-ghost" onclick="openEditModal('category', ${idx})">რედაქტირება</button></td>`;
            catTable.appendChild(tr);
        });
    })
    .catch(err => {
        console.error(err);
        alert('კატეგორიების მიღება ვერ მოხერხდა');
    });
}


function navigate(page, el) {
  document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  document.getElementById('sec-' + page).classList.add('active');
  el.classList.add('active');
  const titles = { dashboard:'დეშბორდი', posts:'პოსტები', comments:'კომენტარები', categories:'კატეგორიები', users:'მომხმარებლები', settings:'პარამეტრები' };
  document.getElementById('topbarTitle').textContent = titles[page] || page;
  closeSidebar();
}

function toggleSidebar() {
  document.getElementById('sidebar').classList.toggle('open');
  document.getElementById('sidebarOverlay').classList.toggle('open');
}

function closeSidebar() {
  document.getElementById('sidebar').classList.remove('open');
  document.getElementById('sidebarOverlay').classList.remove('open');
}

function openModal(id) { 
    document.getElementById(id).classList.add('open'); 
    if(id == 'postModal'){
        axios.get('/api/categories')
        .then(res => {
            const catSelect = document.getElementById('newPostCat');
            catSelect.innerHTML = '';
            res.data['categories'].forEach(cat => {
                const option = document.createElement('option');
                option.value = cat.id;
                option.textContent = cat.name;
                catSelect.appendChild(option);
            });
        })
        .catch(err => {
            console.error(err);
            alert('კატეგორიების მიღება ვერ მოხერხდა');
        });
    }else if(id == 'userModal'){
        getRoles();
    }
}

function openEditModal(type,index){
    if(type === 'post'){
        console.log(index)
        console.log(posts[index])
        document.getElementById('editPostModal').classList.add('open');
        document.getElementById('editPostId').value = posts[index].id;
        document.getElementById('editPostTitle').value = posts[index].title;
        document.getElementById('editPostContent').innerHTML = posts[index].description;
        document.getElementById('editPostStatus').value = posts[index].status;
        let cetegoryField = document.getElementById('editPostCat')
        cetegoryField.innerHTML = ''
        categories.forEach(cat => {
          const option = document.createElement('option');
          
          if(cat.id == posts[index].category.id){
            option.selected = true;
          }
          option.value = cat.id;
          option.textContent = cat.name;
          cetegoryField.appendChild(option);
        })
        

    }else if(type === 'category'){
        document.getElementById('editCategoryModal').classList.add('open');
        document.getElementById('editCatId').value = categories[index].id;
        document.getElementById('editCatName').value = categories[index].name;
        document.getElementById('editCatSlug').value = categories[index].slug;
    }else if(type === 'user'){
        document.getElementById('editUserModal').classList.add('open');
        document.getElementById('editUserId').value = obj.id;
        document.getElementById('editUserName').value = obj.name;
        document.getElementById('editUserEmail').value = obj.email;
        document.getElementById('editUserRole').value = obj.role_id;
    }
}
function closeEditModal(type){
    if(type === 'post'){
        document.getElementById('editPostModal').classList.remove('open');
    }else if(type === 'category'){
        document.getElementById('editCategoryModal').classList.remove('open');
    }else if(type === 'user'){
        document.getElementById('editUserModal').classList.remove('open');
    }
}

function closeModal(id) { document.getElementById(id).classList.remove('open'); }
document.querySelectorAll('.modal-overlay').forEach(o => {
  o.addEventListener('click', e => { if (e.target === o) o.classList.remove('open'); });
});

function showToast(msg) {
  const t = document.getElementById('toast');
  t.textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 2800);
}

new Chart(document.getElementById('viewsChart').getContext('2d'), {
  type: 'line',
  data: {
    labels: ['ორშ','სამ','ოთხ','ხუთ','პარ','შაბ','კვი'],
    datasets: [{
      data: [0,0,0,0,0,0,0],
      borderColor: '#c8a96e',
      backgroundColor: 'rgba(200,169,110,0.08)',
      tension: 0.4, fill: true,
      pointBackgroundColor: '#c8a96e', pointRadius: 4,
    }]
  },
  options: {
    responsive: true,
    plugins: { legend: { display: false } },
    scales: {
      x: { grid: { color: '#f0ede8' }, ticks: { font: { family: 'DM Sans', size: 12 }, color: '#999' } },
      y: { grid: { color: '#f0ede8' }, ticks: { font: { family: 'DM Sans', size: 12 }, color: '#999' } }
    }
  }
});
getCategories();
getPosts();
getUser();
</script>
</body>
</html>