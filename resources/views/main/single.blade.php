<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>პოსტი — Nations at War Mobile</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #f5f4f0;
    --surface: #ffffff;
    --sidebar: #0f0f0f;
    --accent: #c8a96e;
    --accent2: #8b2020;
    --text: #1a1a1a;
    --text-muted: #888;
    --border: #e8e6e0;
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    min-height: 100vh;
  }


  header {
    background: var(--sidebar);
    padding: 0 48px;
    height: 64px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 50;
    border-bottom: 1px solid #1a1a1a;
  }

  .header-brand {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 13px;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--accent);
  }

  .header-nav {
    display: flex;
    align-items: center;
    gap: 32px;
  }

  .header-nav a {
    text-decoration: none;
    font-family: 'Syne', sans-serif;
    font-weight: 600;
    font-size: 11px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #888;
    transition: color 0.2s;
  }

  .header-nav a:hover { color: #fff; }


  .breadcrumb {
    background: var(--surface);
    border-bottom: 1px solid var(--border);
    padding: 14px 48px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    color: var(--text-muted);
    font-family: 'Syne', sans-serif;
    letter-spacing: 0.06em;
  }

  .breadcrumb a {
    color: var(--text-muted);
    text-decoration: none;
    transition: color 0.15s;
  }

  .breadcrumb a:hover { color: var(--accent); }
  .breadcrumb .sep { color: #ccc; }
  .breadcrumb .current { color: var(--text); }


  .page-layout {
    max-width: 1200px;
    margin: 0 auto;
    padding: 56px 48px;
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 56px;
    align-items: start;
  }


  .article {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
  }

  .article-header {
    padding: 40px 44px 32px;
    border-bottom: 1px solid var(--border);
  }

  .article-category {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-family: 'Syne', sans-serif;
    font-size: 10px;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--accent);
    background: rgba(200,169,110,0.1);
    padding: 4px 12px;
    border-radius: 20px;
    margin-bottom: 20px;
    text-decoration: none;
    transition: background 0.2s;
  }

  .article-category:hover { background: rgba(200,169,110,0.18); }

  .article-title {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 30px;
    line-height: 1.2;
    margin-bottom: 20px;
    color: var(--text);
  }

  .article-meta {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
  }

  .meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 12.5px;
    color: var(--text-muted);
  }

  .meta-dot {
    width: 4px; height: 4px;
    border-radius: 50%;
    background: var(--border);
  }

  .article-status {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 600;
    font-family: 'Syne', sans-serif;
    letter-spacing: 0.06em;
    text-transform: uppercase;
  }

  .status-published { background: #e8f5e9; color: #2e7d32; }
  .status-draft { background: #fff3e0; color: #e65100; }

  .article-body {
    padding: 40px 44px;
    font-size: 15px;
    line-height: 1.85;
    color: #2a2a2a;
  }

  .article-body p { margin-bottom: 20px; }
  .article-body p:last-child { margin-bottom: 0; }


  .article-footer {
    padding: 24px 44px;
    border-top: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    flex-wrap: wrap;
  }

  .share-label {
    font-family: 'Syne', sans-serif;
    font-size: 11px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--text-muted);
  }

  .share-btns {
    display: flex;
    gap: 8px;
  }

  .share-btn {
    padding: 7px 16px;
    border: 1px solid var(--border);
    border-radius: 8px;
    font-size: 12px;
    font-family: 'DM Sans', sans-serif;
    background: none;
    cursor: pointer;
    color: var(--text);
    transition: all 0.15s;
  }

  .share-btn:hover { background: var(--sidebar); color: #fff; border-color: var(--sidebar); }


  .sidebar-col { display: flex; flex-direction: column; gap: 24px; }

  .sidebar-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 14px;
    overflow: hidden;
  }

  .sidebar-card-header {
    padding: 16px 20px;
    border-bottom: 1px solid var(--border);
  }

  .sidebar-card-title {
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 10px;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--text-muted);
  }


  .post-info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 20px;
    border-bottom: 1px solid #f5f3ef;
    font-size: 13px;
  }

  .post-info-item:last-child { border-bottom: none; }

  .post-info-label {
    color: var(--text-muted);
    font-size: 12px;
  }

  .post-info-value {
    font-weight: 500;
    font-size: 13px;
    text-align: right;
  }


  .related-post {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 14px 20px;
    border-bottom: 1px solid #f5f3ef;
    text-decoration: none;
    color: var(--text);
    transition: background 0.15s;
  }

  .related-post:last-child { border-bottom: none; }
  .related-post:hover { background: var(--bg); }

  .related-num {
    font-family: 'Syne', sans-serif;
    font-size: 10px;
    color: var(--text-muted);
    margin-top: 3px;
    flex-shrink: 0;
  }

  .related-title {
    font-family: 'Syne', sans-serif;
    font-weight: 600;
    font-size: 13px;
    line-height: 1.4;
    margin-bottom: 4px;
  }

  .related-date { font-size: 11px; color: var(--text-muted); }


  .cat-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 20px;
    border-bottom: 1px solid #f5f3ef;
    text-decoration: none;
    color: var(--text);
    transition: background 0.15s;
  }

  .cat-item:last-child { border-bottom: none; }
  .cat-item:hover { background: var(--bg); }
  .cat-item:hover .cat-item-name { color: var(--accent); }

  .cat-item-name {
    font-family: 'Syne', sans-serif;
    font-size: 13px;
    font-weight: 600;
    transition: color 0.15s;
  }

  .cat-item-count {
    font-size: 11px;
    color: var(--text-muted);
    background: var(--bg);
    padding: 2px 8px;
    border-radius: 20px;
    font-family: 'Syne', sans-serif;
  }

  /* ── FOOTER ── */
  footer {
    background: var(--sidebar);
    padding: 32px 48px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid #1a1a1a;
  }

  .footer-brand {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 12px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--accent);
  }

  .footer-copy { font-size: 12px; color: #333; }


  .loading {
    padding: 48px;
    text-align: center;
    color: var(--text-muted);
    font-size: 13px;
    font-family: 'Syne', sans-serif;
    letter-spacing: 0.08em;
    text-transform: uppercase;
  }


  @media (max-width: 900px) {
    .page-layout { grid-template-columns: 1fr; gap: 32px; }
    .page-layout, .breadcrumb, header, footer { padding-left: 24px; padding-right: 24px; }
    .article-header, .article-body, .article-footer { padding-left: 24px; padding-right: 24px; }
  }

  @media (max-width: 600px) {
    .article-title { font-size: 22px; }
    .header-nav { display: none; }
  }
</style>
</head>
<body>

<header>
  <div class="header-brand">Nations at War Mobile</div>
  <nav class="header-nav">
    <a href="#">მთავარი</a>
    <a href="/categories">კატეგორიები</a>
    <a href="#">პოსტები</a>
    <a href="#">შესახებ</a>
  </nav>
</header>

<div class="breadcrumb" id="breadcrumb">
  <a href="/">მთავარი</a>
  <span class="sep">›</span>
  <a href="/categories">კატეგორიები</a>
  <span class="sep">›</span>
  <span class="current" id="breadCat">—</span>
  <span class="sep">›</span>
  <span class="current" id="breadTitle">იტვირთება...</span>
</div>

<div class="page-layout">

  
  <main>
    <article class="article" id="articleEl">
      <div class="loading">იტვირთება...</div>
    </article>
  </main>

  
  <aside class="sidebar-col">

    
    <div class="sidebar-card" id="postInfoCard" style="display:none">
      <div class="sidebar-card-header">
        <div class="sidebar-card-title">პოსტის ინფო</div>
      </div>
      <div id="postInfoBody"></div>
    </div>

    
    <div class="sidebar-card">
      <div class="sidebar-card-header">
        <div class="sidebar-card-title">სხვა პოსტები</div>
      </div>
      <div id="relatedPosts"><div class="loading" style="padding:24px">იტვირთება...</div></div>
    </div>

    
    <div class="sidebar-card">
      <div class="sidebar-card-header">
        <div class="sidebar-card-title">კატეგორიები</div>
      </div>
      <div id="sidebarCats"><div class="loading" style="padding:24px">იტვირთება...</div></div>
    </div>

  </aside>
</div>

<footer>
  <div class="footer-brand">Nations at War Mobile</div>
  <div class="footer-copy">© 2025 NAWM Blog</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

const postId = window.location.pathname.split('/').pop() || 1;


axios.get(`/info/api/post/${postId}`).then(res => {
  const p = res.data.posts;

  document.getElementById('breadTitle').textContent = p.title;
  if (p.category) {
    const bc = document.getElementById('breadCat');
    bc.textContent = p.category.title;
    bc.outerHTML = `<a href="/category/${p.category.slug}" class="" style="color:var(--text-muted);text-decoration:none;transition:color 0.15s">${p.category.title}</a>`;
  }

  
  const article = document.getElementById('articleEl');
  article.innerHTML = `
    <div class="article-header">
      ${p.category ? `<a href="/category/${p.category.slug}" class="article-category">◑ ${p.category.title}</a>` : ''}
      <h1 class="article-title">${p.title}</h1>
      <div class="article-meta">
        <div class="meta-item">${new Date(p.created_at).toLocaleDateString('ka-GE', { year:'numeric', month:'long', day:'numeric' })}</div>
        <div class="meta-dot"></div>
        <div class="meta-item">${p.author ? p.author.name : 'NAWM Team'}</div>
        <div class="meta-dot"></div>
        <span class="article-status status-${p.status}">${p.status === 'published' ? 'გამოქვეყნებული' : 'მონახაზი'}</span>
      </div>
    </div>
    <div class="article-body">
      ${p.description ? p.description.split('\n').map(line => line.trim() ? `<p>${line}</p>` : '').join('') : '<p>კონტენტი არ არის.</p>'}
    </div>
    <div class="article-footer">
      <span class="share-label">გაზიარება</span>
      <div class="share-btns">
        <button class="share-btn" onclick="navigator.clipboard.writeText(location.href);this.textContent='✓ დაკოპირდა'">🔗 ბმული</button>
        <button class="share-btn">Twitter</button>
        <button class="share-btn">Facebook</button>
      </div>
    </div>`;


  document.getElementById('postInfoCard').style.display = 'block';
  document.getElementById('postInfoBody').innerHTML = `
    <div class="post-info-item"><span class="post-info-label">სტატუსი</span><span class="post-info-value"><span class="article-status status-${p.status}">${p.status}</span></span></div>
    <div class="post-info-item"><span class="post-info-label">კატეგორია</span><span class="post-info-value">${p.category ? p.category.title : '—'}</span></div>
    <div class="post-info-item"><span class="post-info-label">ავტორი</span><span class="post-info-value">${p.author ? p.author.name : 'NAWM Team'}</span></div>
    <div class="post-info-item"><span class="post-info-label">თარიღი</span><span class="post-info-value">${new Date(p.created_at).toLocaleDateString()}</span></div>`;

}).catch(err => {
  console.error(err);
  document.getElementById('articleEl').innerHTML = `<div class="loading">პოსტი ვერ მოიძებნა</div>`;
});


axios.get('/info/api/posts').then(res => {
  const posts = res.data.posts.filter(p => p.id != postId).slice(0, 5);
  const container = document.getElementById('relatedPosts');
  if (!posts.length) { container.innerHTML = '<div class="loading" style="padding:20px">სხვა პოსტი არ არის</div>'; return; }
  container.innerHTML = '';
  posts.forEach((p, i) => {
    const a = document.createElement('a');
    a.href = `/post/${p.id}`;
    a.className = 'related-post';
    a.innerHTML = `
      <span class="related-num">0${i+1}</span>
      <div>
        <div class="related-title">${p.title}</div>
        <div class="related-date">${new Date(p.created_at).toLocaleDateString()}</div>
      </div>`;
    container.appendChild(a);
  });
}).catch(err => console.error(err));


axios.get('/info/api/categories').then(res => {
  const container = document.getElementById('sidebarCats');
  container.innerHTML = '';
  res.data.categories.forEach(c => {
    const a = document.createElement('a');
    a.href = `/category/${c.slug}`;
    a.className = 'cat-item';
    a.innerHTML = `<span class="cat-item-name">${c.name}</span><span class="cat-item-count">${c.posts_count || 0}</span>`;
    container.appendChild(a);
  });
}).catch(err => console.error(err));
</script>
</body>
</html>