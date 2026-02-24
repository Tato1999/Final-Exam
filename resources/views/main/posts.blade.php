<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ყველა პოსტი — Nations at War Mobile</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #f5f4f0; --surface: #ffffff; --sidebar: #0f0f0f;
    --accent: #c8a96e; --accent2: #8b2020; --text: #1a1a1a;
    --text-muted: #888; --border: #e8e6e0;
  }
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; }

  /* HEADER */
  header { background: var(--sidebar); padding: 0 48px; height: 64px; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 50; border-bottom: 1px solid #1a1a1a; }
  .header-brand { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 13px; letter-spacing: 0.14em; text-transform: uppercase; color: var(--accent); text-decoration: none; }
  .header-nav { display: flex; gap: 32px; }
  .header-nav a { text-decoration: none; font-family: 'Syne', sans-serif; font-weight: 600; font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; color: #888; transition: color 0.2s; }
  .header-nav a:hover { color: #fff; }
  .header-nav a.active { color: var(--accent); }

  /* BREADCRUMB */
  .breadcrumb { background: var(--surface); border-bottom: 1px solid var(--border); padding: 14px 48px; display: flex; align-items: center; gap: 8px; font-size: 12px; color: var(--text-muted); font-family: 'Syne', sans-serif; letter-spacing: 0.06em; }
  .breadcrumb a { color: var(--text-muted); text-decoration: none; transition: color 0.15s; }
  .breadcrumb a:hover { color: var(--accent); }
  .breadcrumb .sep { color: #ccc; }

  /* HERO */
  .hero { background: var(--sidebar); padding: 60px 48px 52px; border-bottom: 1px solid #1a1a1a; position: relative; overflow: hidden; }
  .hero::after { content: 'POSTS'; position: absolute; right: 24px; bottom: -20px; font-family: 'Syne', sans-serif; font-weight: 800; font-size: 140px; color: #ffffff05; letter-spacing: -0.04em; pointer-events: none; user-select: none; line-height: 1; }
  .hero-inner { max-width: 1200px; margin: 0 auto; position: relative; z-index: 1; display: flex; align-items: flex-end; justify-content: space-between; gap: 32px; flex-wrap: wrap; }
  .hero-left {}
  .hero-label { font-family: 'Syne', sans-serif; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); margin-bottom: 14px; display: flex; align-items: center; gap: 10px; }
  .hero-label::before { content: ''; display: block; width: 24px; height: 1px; background: var(--accent); }
  .hero h1 { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 42px; color: #fff; line-height: 1.1; }
  .hero-total { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 56px; color: #ffffff12; line-height: 1; }

  /* TOOLBAR */
  .toolbar { background: var(--surface); border-bottom: 1px solid var(--border); padding: 0 48px; }
  .toolbar-inner { max-width: 1200px; margin: 0 auto; display: flex; align-items: center; gap: 0; overflow-x: auto; scrollbar-width: none; }
  .toolbar-inner::-webkit-scrollbar { display: none; }

  .toolbar-cat {
    padding: 16px 22px;
    font-family: 'Syne', sans-serif;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--text-muted);
    cursor: pointer;
    border: none;
    background: none;
    border-bottom: 2px solid transparent;
    transition: all 0.15s;
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .toolbar-cat:hover { color: var(--text); }
  .toolbar-cat.active { color: var(--accent); border-bottom-color: var(--accent); }
  .toolbar-cat-count { background: var(--bg); padding: 1px 6px; border-radius: 10px; font-size: 10px; color: var(--text-muted); }

  /* LAYOUT */
  .page-layout { max-width: 1200px; margin: 0 auto; padding: 48px 48px; display: grid; grid-template-columns: 1fr 280px; gap: 48px; align-items: start; }

  /* SEARCH + SORT */
  .list-controls { display: flex; gap: 12px; margin-bottom: 24px; align-items: center; }
  .search-wrap { flex: 1; position: relative; }
  .search-input { width: 100%; padding: 10px 14px 10px 38px; border: 1px solid var(--border); border-radius: 8px; font-size: 13px; font-family: 'DM Sans', sans-serif; background: var(--surface); outline: none; transition: border-color 0.2s; color: var(--text); }
  .search-input:focus { border-color: var(--accent); }
  .search-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); font-size: 14px; color: var(--text-muted); pointer-events: none; }
  .sort-select { padding: 10px 14px; border: 1px solid var(--border); border-radius: 8px; font-size: 12px; font-family: 'Syne', sans-serif; background: var(--surface); outline: none; cursor: pointer; color: var(--text); letter-spacing: 0.04em; }

  /* RESULTS COUNT */
  .results-info { font-family: 'Syne', sans-serif; font-size: 10px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 20px; }

  /* POST CARD */
  .post-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 26px 28px;
    text-decoration: none;
    color: var(--text);
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 16px;
    align-items: start;
    margin-bottom: 14px;
    transition: box-shadow 0.2s, transform 0.2s, border-color 0.2s;
    position: relative;
    overflow: hidden;
  }
  .post-card::before { content: ''; position: absolute; top: 0; left: 0; width: 3px; height: 100%; background: var(--accent); opacity: 0; transition: opacity 0.2s; }
  .post-card:hover { box-shadow: 0 6px 24px rgba(0,0,0,0.07); transform: translateY(-2px); border-color: #ddd; }
  .post-card:hover::before { opacity: 1; }

  .post-top { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
  .post-cat-badge { font-family: 'Syne', sans-serif; font-size: 10px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--accent); background: rgba(200,169,110,0.1); padding: 3px 10px; border-radius: 20px; }
  .badge-status { font-family: 'Syne', sans-serif; font-size: 10px; letter-spacing: 0.06em; text-transform: uppercase; padding: 3px 9px; border-radius: 20px; font-weight: 600; }
  .badge-published { background: #e8f5e9; color: #2e7d32; }
  .badge-draft { background: #fff3e0; color: #e65100; }

  .post-title { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 16px; line-height: 1.35; margin-bottom: 8px; transition: color 0.15s; }
  .post-card:hover .post-title { color: var(--accent2); }
  .post-excerpt { font-size: 13px; color: var(--text-muted); line-height: 1.7; margin-bottom: 14px; }
  .post-date { font-size: 12px; color: var(--text-muted); }

  .post-arrow-box { width: 38px; height: 38px; border: 1px solid var(--border); border-radius: 9px; display: flex; align-items: center; justify-content: center; font-size: 15px; color: var(--text-muted); flex-shrink: 0; margin-top: 2px; transition: all 0.2s; }
  .post-card:hover .post-arrow-box { background: var(--sidebar); color: var(--accent); border-color: var(--sidebar); }

  /* EMPTY */
  .empty { text-align: center; padding: 64px 24px; color: var(--text-muted); font-family: 'Syne', sans-serif; font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; background: var(--surface); border: 1px solid var(--border); border-radius: 14px; }

  /* PAGINATION */
  .pagination { display: flex; align-items: center; justify-content: center; gap: 6px; margin-top: 32px; }
  .page-btn { width: 36px; height: 36px; border: 1px solid var(--border); border-radius: 8px; background: var(--surface); font-family: 'Syne', sans-serif; font-size: 12px; cursor: pointer; color: var(--text-muted); transition: all 0.15s; display: flex; align-items: center; justify-content: center; }
  .page-btn:hover { border-color: var(--accent); color: var(--accent); }
  .page-btn.active { background: var(--sidebar); color: var(--accent); border-color: var(--sidebar); }
  .page-btn:disabled { opacity: 0.3; cursor: default; }

  /* SIDEBAR */
  .sidebar-col { display: flex; flex-direction: column; gap: 20px; }
  .sidebar-card { background: var(--surface); border: 1px solid var(--border); border-radius: 14px; overflow: hidden; }
  .sidebar-card-header { padding: 15px 20px; border-bottom: 1px solid var(--border); }
  .sidebar-card-title { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 10px; letter-spacing: 0.14em; text-transform: uppercase; color: var(--text-muted); }

  .cat-item { display: flex; align-items: center; justify-content: space-between; padding: 12px 20px; border-bottom: 1px solid #f5f3ef; text-decoration: none; color: var(--text); transition: background 0.15s; cursor: pointer; border: none; background: none; width: 100%; text-align: left; }
  .cat-item:last-child { border-bottom: none; }
  .cat-item:hover { background: var(--bg); }
  .cat-item.active { background: rgba(200,169,110,0.06); }
  .cat-item-name { font-family: 'Syne', sans-serif; font-size: 13px; font-weight: 600; transition: color 0.15s; }
  .cat-item:hover .cat-item-name, .cat-item.active .cat-item-name { color: var(--accent); }
  .cat-item-count { font-size: 11px; color: var(--text-muted); background: var(--bg); padding: 2px 8px; border-radius: 20px; font-family: 'Syne', sans-serif; }

  /* FOOTER */
  footer { background: var(--sidebar); padding: 32px 48px; display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #1a1a1a; margin-top: 48px; }
  .footer-brand { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 12px; letter-spacing: 0.12em; text-transform: uppercase; color: var(--accent); }
  .footer-copy { font-size: 12px; color: #333; }

  @media (max-width: 900px) {
    .page-layout { grid-template-columns: 1fr; }
    .page-layout, .breadcrumb, header, footer, .hero, .toolbar { padding-left: 20px; padding-right: 20px; }
    .hero-total { display: none; }
  }
  @media (max-width: 600px) {
    .hero h1 { font-size: 28px; }
    .hero::after { display: none; }
    .header-nav { display: none; }
    .post-card { grid-template-columns: 1fr; }
    .post-arrow-box { display: none; }
  }
</style>
</head>
<body>

<header>
  <a href="/" class="header-brand">Nations at War Mobile</a>
  <nav class="header-nav">
    <a href="/">მთავარი</a>
    <a href="/categories">კატეგორიები</a>
    <a href="/posts" class="active">პოსტები</a>
  </nav>
</header>

<div class="breadcrumb">
  <a href="/">მთავარი</a>
  <span class="sep">›</span>
  <span>ყველა პოსტი</span>
</div>

<section class="hero">
  <div class="hero-inner">
    <div class="hero-left">
      <div class="hero-label">ბლოგი</div>
      <h1>ყველა პოსტი</h1>
    </div>
    <div class="hero-total" id="heroTotal">0</div>
  </div>
</section>

<!-- CATEGORY TABS -->
<div class="toolbar">
  <div class="toolbar-inner" id="catTabs">
    <button class="toolbar-cat active" onclick="filterByCat(null, this)">
      ყველა <span class="toolbar-cat-count" id="tabAllCount">0</span>
    </button>
  </div>
</div>

<div class="page-layout">

  <!-- MAIN -->
  <main>
    <div class="list-controls">
      <div class="search-wrap">
        <span class="search-icon">🔍</span>
        <input class="search-input" id="searchInput" placeholder="პოსტის ძებნა..." oninput="applyFilters()">
      </div>
      <select class="sort-select" id="sortSelect" onchange="applyFilters()">
        <option value="newest">უახლესი</option>
        <option value="oldest">უძველესი</option>
        <option value="az">A → Z</option>
        <option value="za">Z → A</option>
      </select>
    </div>

    <div class="results-info" id="resultsInfo">იტვირთება...</div>
    <div id="postsList"></div>
    <div class="pagination" id="pagination"></div>
  </main>

  <!-- SIDEBAR -->
  <aside class="sidebar-col">
    <div class="sidebar-card">
      <div class="sidebar-card-header"><div class="sidebar-card-title">კატეგორიები</div></div>
      <div id="sidebarCats"></div>
    </div>
  </aside>

</div>

<footer>
  <div class="footer-brand">Nations at War Mobile</div>
  <div class="footer-copy">© 2025 NAWM Blog</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
let allPosts = [];
let allCats = [];
let activeCatId = null;
const PER_PAGE = 10;
let currentPage = 1;

function applyFilters() {
  const q = document.getElementById('searchInput').value.toLowerCase().trim();
  const sort = document.getElementById('sortSelect').value;

  let filtered = allPosts.filter(p => {
    const matchCat = activeCatId === null || p.category_id === activeCatId;
    const matchSearch = !q || p.title.toLowerCase().includes(q) || (p.content && p.content.toLowerCase().includes(q));
    return matchCat && matchSearch;
  });

  if (sort === 'newest') filtered.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
  else if (sort === 'oldest') filtered.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
  else if (sort === 'az') filtered.sort((a, b) => a.title.localeCompare(b.title));
  else if (sort === 'za') filtered.sort((a, b) => b.title.localeCompare(a.title));

  currentPage = 1;
  renderPosts(filtered);
}

function renderPosts(posts) {
  const list = document.getElementById('postsList');
  const total = posts.length;
  const totalPages = Math.ceil(total / PER_PAGE);
  const start = (currentPage - 1) * PER_PAGE;
  const paged = posts.slice(start, start + PER_PAGE);

  document.getElementById('resultsInfo').textContent = total + ' პოსტი ნაპოვნია';

  if (!paged.length) {
    list.innerHTML = '<div class="empty">პოსტები არ მოიძებნა</div>';
    document.getElementById('pagination').innerHTML = '';
    return;
  }

  list.innerHTML = '';
  paged.forEach((p, i) => {
    const a = document.createElement('a');
    a.href = `/post/${p.id}`;
    a.className = 'post-card';
    a.innerHTML = `
      <div>
        <div class="post-top">
          ${p.category ? `<span class="post-cat-badge">${p.category.title}</span>` : ''}
          <span class="badge-status badge-${p.status}">${p.status === 'published' ? 'გამოქვეყნებული' : 'მონახაზი'}</span>
        </div>
        <div class="post-title">${p.title}</div>
        <div class="post-excerpt">${p.content ? p.content.substring(0, 130) + '...' : ''}</div>
        <div class="post-date">${new Date(p.created_at).toLocaleDateString('ka-GE', {year:'numeric', month:'long', day:'numeric'})}</div>
      </div>
      <div class="post-arrow-box">→</div>`;
    list.appendChild(a);
  });

  // Pagination
  const pag = document.getElementById('pagination');
  pag.innerHTML = '';
  if (totalPages <= 1) return;

  const prevBtn = document.createElement('button');
  prevBtn.className = 'page-btn';
  prevBtn.textContent = '←';
  prevBtn.disabled = currentPage === 1;
  prevBtn.onclick = () => { currentPage--; renderPosts(posts); };
  pag.appendChild(prevBtn);

  for (let i = 1; i <= totalPages; i++) {
    const btn = document.createElement('button');
    btn.className = 'page-btn' + (i === currentPage ? ' active' : '');
    btn.textContent = i;
    btn.onclick = ((page) => () => { currentPage = page; renderPosts(posts); })(i);
    pag.appendChild(btn);
  }

  const nextBtn = document.createElement('button');
  nextBtn.className = 'page-btn';
  nextBtn.textContent = '→';
  nextBtn.disabled = currentPage === totalPages;
  nextBtn.onclick = () => { currentPage++; renderPosts(posts); };
  pag.appendChild(nextBtn);
}

function filterByCat(catId, el) {
  activeCatId = catId;
  document.querySelectorAll('.toolbar-cat').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.cat-item').forEach(b => b.classList.remove('active'));
  if (el) el.classList.add('active');
  applyFilters();
}

// Load data
Promise.all([
  axios.get('/info/api/posts'),
  axios.get('/info/api/categories')
]).then(([postsRes, catsRes]) => {
  allPosts = postsRes.data.posts;
  allCats = catsRes.data.categories;

  document.getElementById('heroTotal').textContent = allPosts.length;
  document.getElementById('tabAllCount').textContent = allPosts.length;

  // Category tabs
  const tabs = document.getElementById('catTabs');
  allCats.forEach(c => {
    const count = allPosts.filter(p => p.category_id === c.id).length;
    const btn = document.createElement('button');
    btn.className = 'toolbar-cat';
    btn.innerHTML = `${c.name} <span class="toolbar-cat-count">${count}</span>`;
    btn.onclick = function() { filterByCat(c.id, this); };
    tabs.appendChild(btn);
  });

  // Sidebar cats
  const sidebarCats = document.getElementById('sidebarCats');

  const allBtn = document.createElement('button');
  allBtn.className = 'cat-item active';
  allBtn.innerHTML = `<span class="cat-item-name">ყველა</span><span class="cat-item-count">${allPosts.length}</span>`;
  allBtn.onclick = function() {
    document.querySelectorAll('.cat-item').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.toolbar-cat').forEach(b => b.classList.remove('active'));
    document.querySelector('.toolbar-cat').classList.add('active');
    this.classList.add('active');
    filterByCat(null, null);
  };
  sidebarCats.appendChild(allBtn);

  allCats.forEach(c => {
    const count = allPosts.filter(p => p.id === c.id).length;
    const btn = document.createElement('button');
    btn.className = 'cat-item';
    btn.innerHTML = `<span class="cat-item-name">${c.name}</span><span class="cat-item-count">${count}</span>`;
    btn.onclick = function() {
      document.querySelectorAll('.cat-item').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.toolbar-cat').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      filterByCat(c.id, null);
    };
    sidebarCats.appendChild(btn);
  });

  applyFilters();
}).catch(err => {
  console.error(err);
  document.getElementById('postsList').innerHTML = '<div class="empty">ჩატვირთვა ვერ მოხერხდა</div>';
});
</script>
</body>
</html>