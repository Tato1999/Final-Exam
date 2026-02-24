<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nations at War Mobile — ბლოგი</title>
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

  /* ── HEADER ── */
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
    text-decoration: none;
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
  .header-nav a.active { color: var(--accent); }

  /* ── HERO ── */
  .hero {
    background: var(--sidebar);
    padding: 80px 48px 72px;
    position: relative;
    overflow: hidden;
    border-bottom: 1px solid #1a1a1a;
  }

  .hero::after {
    content: 'NAWM';
    position: absolute;
    right: -10px;
    bottom: -20px;
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 180px;
    color: #ffffff06;
    letter-spacing: -0.04em;
    pointer-events: none;
    user-select: none;
    line-height: 1;
  }

  .hero-inner {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
    position: relative;
    z-index: 1;
  }

  .hero-label {
    font-family: 'Syne', sans-serif;
    font-size: 10px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--accent);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .hero-label::before {
    content: '';
    display: block;
    width: 28px;
    height: 1px;
    background: var(--accent);
  }

  .hero h1 {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 52px;
    color: #fff;
    line-height: 1.08;
    letter-spacing: -0.01em;
    margin-bottom: 24px;
  }

  .hero h1 span { color: var(--accent); }

  .hero-desc {
    color: #555;
    font-size: 15px;
    line-height: 1.75;
    margin-bottom: 36px;
    max-width: 420px;
  }

  .hero-actions {
    display: flex;
    gap: 12px;
    align-items: center;
  }

  .btn-hero-primary {
    padding: 12px 28px;
    background: var(--accent);
    color: var(--sidebar);
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 12px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    text-decoration: none;
    transition: opacity 0.2s;
    display: inline-block;
  }

  .btn-hero-primary:hover { opacity: 0.88; }

  .btn-hero-ghost {
    padding: 12px 28px;
    background: none;
    color: #888;
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 12px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    border: 1px solid #2a2a2a;
    border-radius: 8px;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s;
    display: inline-block;
  }

  .btn-hero-ghost:hover { border-color: #444; color: #ccc; }

  /* Hero stats */
  .hero-stats {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .stat-box {
    background: #181818;
    border: 1px solid #222;
    border-radius: 12px;
    padding: 24px 28px;
    position: relative;
    overflow: hidden;
  }

  .stat-box::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: var(--accent);
  }

  .stat-box:nth-child(2)::before { background: var(--accent2); }
  .stat-box:nth-child(3)::before { background: #2980b9; }

  .stat-box-value {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 36px;
    color: #fff;
    line-height: 1;
    margin-bottom: 6px;
  }

  .stat-box-label {
    font-family: 'Syne', sans-serif;
    font-size: 10px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: #444;
  }

  /* ── FEATURED POST (big card) ── */
  .section {
    max-width: 1200px;
    margin: 0 auto;
    padding: 64px 48px;
  }

  .section + .section { padding-top: 0; }

  .section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 32px;
  }

  .section-label {
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 10px;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .section-label::before {
    content: '';
    display: block;
    width: 20px;
    height: 2px;
    background: var(--accent);
  }

  .view-all {
    font-family: 'Syne', sans-serif;
    font-size: 11px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--accent);
    text-decoration: none;
    transition: opacity 0.2s;
  }

  .view-all:hover { opacity: 0.7; }

  /* Featured */
  .featured-post {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 40px 44px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: center;
    text-decoration: none;
    color: var(--text);
    transition: box-shadow 0.2s, transform 0.2s;
    margin-bottom: 24px;
    position: relative;
    overflow: hidden;
  }

  .featured-post::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--accent), var(--accent2));
  }

  .featured-post:hover {
    box-shadow: 0 12px 40px rgba(0,0,0,0.08);
    transform: translateY(-2px);
  }

  .featured-label {
    font-family: 'Syne', sans-serif;
    font-size: 10px;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--accent);
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .featured-label::before {
    content: '★';
    font-size: 10px;
  }

  .featured-title {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 26px;
    line-height: 1.2;
    margin-bottom: 16px;
    transition: color 0.15s;
  }

  .featured-post:hover .featured-title { color: var(--accent2); }

  .featured-excerpt {
    font-size: 14px;
    color: var(--text-muted);
    line-height: 1.75;
    margin-bottom: 24px;
  }

  .featured-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 12px;
    color: var(--text-muted);
  }

  .cat-badge {
    font-family: 'Syne', sans-serif;
    font-size: 10px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--accent);
    background: rgba(200,169,110,0.1);
    padding: 3px 10px;
    border-radius: 20px;
  }

  .featured-visual {
    background: var(--sidebar);
    border-radius: 12px;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Syne', sans-serif;
    font-size: 72px;
    color: #ffffff0a;
    font-weight: 800;
    letter-spacing: -0.04em;
    overflow: hidden;
    position: relative;
  }

  .featured-visual::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(200,169,110,0.12), transparent);
  }

  /* ── POSTS GRID ── */
  .posts-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }

  .post-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 24px;
    text-decoration: none;
    color: var(--text);
    display: flex;
    flex-direction: column;
    gap: 12px;
    transition: box-shadow 0.2s, transform 0.2s, border-color 0.2s;
  }

  .post-card:hover {
    box-shadow: 0 8px 28px rgba(0,0,0,0.07);
    transform: translateY(-2px);
    border-color: #ddd;
  }

  .post-card-cat {
    font-family: 'Syne', sans-serif;
    font-size: 10px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--accent);
  }

  .post-card-title {
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 15px;
    line-height: 1.35;
    transition: color 0.15s;
  }

  .post-card:hover .post-card-title { color: var(--accent2); }

  .post-card-excerpt {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.65;
    flex: 1;
  }

  .post-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 12px;
    border-top: 1px solid var(--border);
    font-size: 12px;
    color: var(--text-muted);
  }

  .post-arrow {
    font-size: 14px;
    color: var(--text-muted);
    transition: transform 0.2s, color 0.2s;
  }

  .post-card:hover .post-arrow { transform: translateX(4px); color: var(--accent); }

  /* ── CATEGORIES STRIP ── */
  .cats-strip {
    background: var(--surface);
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    padding: 0 48px;
  }

  .cats-strip-inner {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    gap: 0;
    overflow-x: auto;
    scrollbar-width: none;
  }

  .cats-strip-inner::-webkit-scrollbar { display: none; }

  .cat-strip-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 20px 28px;
    text-decoration: none;
    color: var(--text-muted);
    border-right: 1px solid var(--border);
    white-space: nowrap;
    transition: background 0.15s, color 0.15s;
    font-family: 'Syne', sans-serif;
    font-size: 11px;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    font-weight: 600;
  }

  .cat-strip-item:first-child { border-left: none; }
  .cat-strip-item:hover { background: var(--bg); color: var(--accent); }

  .cat-strip-count {
    background: var(--bg);
    padding: 2px 7px;
    border-radius: 20px;
    font-size: 10px;
    color: var(--text-muted);
  }

  /* ── FOOTER ── */
  footer {
    background: var(--sidebar);
    border-top: 1px solid #1a1a1a;
    padding: 48px;
  }

  .footer-inner {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 48px;
    margin-bottom: 40px;
  }

  .footer-brand-block .brand {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 13px;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--accent);
    margin-bottom: 12px;
  }

  .footer-brand-block p {
    font-size: 13px;
    color: #444;
    line-height: 1.7;
    max-width: 240px;
  }

  .footer-col-title {
    font-family: 'Syne', sans-serif;
    font-size: 10px;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: #333;
    margin-bottom: 16px;
  }

  .footer-col a {
    display: block;
    font-size: 13px;
    color: #444;
    text-decoration: none;
    margin-bottom: 10px;
    transition: color 0.15s;
  }

  .footer-col a:hover { color: #888; }

  .footer-bottom {
    max-width: 1200px;
    margin: 0 auto;
    padding-top: 24px;
    border-top: 1px solid #1a1a1a;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 12px;
    color: #2a2a2a;
  }

  /* ── EMPTY STATE ── */
  .empty {
    text-align: center;
    padding: 64px 24px;
    color: var(--text-muted);
    font-family: 'Syne', sans-serif;
    font-size: 12px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
  }

  /* ── RESPONSIVE ── */
  @media (max-width: 1000px) {
    .posts-grid { grid-template-columns: repeat(2, 1fr); }
    .hero-inner { grid-template-columns: 1fr; gap: 40px; }
    .hero-stats { flex-direction: row; flex-wrap: wrap; }
    .stat-box { flex: 1; min-width: 140px; }
    .featured-post { grid-template-columns: 1fr; }
    .featured-visual { display: none; }
    .footer-inner { grid-template-columns: 1fr 1fr; }
  }

  @media (max-width: 700px) {
    .posts-grid { grid-template-columns: 1fr; }
    .section, footer { padding-left: 20px; padding-right: 20px; }
    header, .cats-strip { padding-left: 20px; padding-right: 20px; }
    .hero { padding: 48px 20px 40px; }
    .hero h1 { font-size: 34px; }
    .hero::after { display: none; }
    .header-nav { display: none; }
    .footer-inner { grid-template-columns: 1fr; }
  }
</style>
</head>
<body>

<header>
  <a href="/" class="header-brand">Nations at War Mobile</a>
  <nav class="header-nav">
    <a href="/" class="active">მთავარი</a>
    <a href="/categories">კატეგორიები</a>
    <a href="/posts">პოსტები</a>
    <a href="/about">შესახებ</a>
  </nav>
</header>

<!-- HERO -->
<section class="hero">
  <div class="hero-inner">
    <div>
      <div class="hero-label">Nations at War Mobile Blog</div>
      <h1>სტრატეგია.<br>სიახლეები.<br><span>გამარჯვება.</span></h1>
      <p class="hero-desc">NAWM-ის ოფიციალური ბლოგი — სადაც სტრატეგიული მოაზროვნეები იკრიბებიან. სიახლეები, გაიდები და ანალიზი Nations at War Mobile-ის სამყაროდან.</p>
      <div class="hero-actions">
        <a href="/categories" class="btn-hero-primary">კატეგორიები</a>
        <a href="/posts" class="btn-hero-ghost">ყველა პოსტი</a>
      </div>
    </div>
    <div class="hero-stats" id="heroStats">
      <div class="stat-box">
        <div class="stat-box-value" id="statPosts">—</div>
        <div class="stat-box-label">სულ პოსტი</div>
      </div>
      <div class="stat-box">
        <div class="stat-box-value" id="statCats">—</div>
        <div class="stat-box-label">კატეგორია</div>
      </div>
      <div class="stat-box">
        <div class="stat-box-value" id="statAuthors">—</div>
        <div class="stat-box-label">ავტორი</div>
      </div>
    </div>
  </div>
</section>

<!-- CATEGORIES STRIP -->
<div class="cats-strip">
  <div class="cats-strip-inner" id="catsStrip">
    <!-- JS fills -->
  </div>
</div>

<!-- FEATURED POST -->
<div class="section">
  <div class="section-header">
    <div class="section-label">გამორჩეული</div>
    <a href="/posts" class="view-all">ყველა პოსტი →</a>
  </div>
  <div id="featuredPost">
    <div class="empty">იტვირთება...</div>
  </div>
</div>

<!-- LATEST POSTS -->
<div class="section" style="padding-top:0">
  <div class="section-header">
    <div class="section-label">ბოლო პოსტები</div>
    <a href="/posts" class="view-all">მეტი →</a>
  </div>
  <div class="posts-grid" id="postsGrid">
    <!-- JS fills -->
  </div>
</div>

<!-- FOOTER -->
<footer>
  <div class="footer-inner">
    <div class="footer-brand-block">
      <div class="brand">Nations at War Mobile</div>
      <p>სტრატეგიული მობილური თამაშის ოფიციალური ბლოგი. სიახლეები, გაიდები, ანალიზი.</p>
    </div>
    <div class="footer-col">
      <div class="footer-col-title">სექციები</div>
      <a href="/categories">კატეგორიები</a>
      <a href="/posts">ყველა პოსტი</a>
      <a href="/about">შესახებ</a>
    </div>
    <div class="footer-col" id="footerCats">
      <div class="footer-col-title">კატეგორიები</div>
      <!-- JS fills -->
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2025 Nations at War Mobile Blog</span>
    <span>v1.0.0</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
// Load categories
axios.get('/info/api/categories').then(res => {
  const cats = res.data.categories;
  document.getElementById('statCats').textContent = cats.length;

  // Strip
  const strip = document.getElementById('catsStrip');
  cats.forEach(c => {
    const a = document.createElement('a');
    a.href = `/category/${c.slug}`;
    a.className = 'cat-strip-item';
    a.innerHTML = `${c.name}<span class="cat-strip-count">${c.posts_count || 0}</span>`;
    strip.appendChild(a);
  });

  // Footer cats
  const footerCats = document.getElementById('footerCats');
  const title = footerCats.querySelector('.footer-col-title');
  footerCats.innerHTML = '';
  footerCats.appendChild(title);
  cats.slice(0, 5).forEach(c => {
    const a = document.createElement('a');
    a.href = `/category/${c.slug}`;
    a.textContent = c.name;
    footerCats.appendChild(a);
  });
}).catch(err => console.error(err));

// Load posts
axios.get('/info/api/posts').then(res => {
  const posts = res.data.posts;
  document.getElementById('statPosts').textContent = posts.length;

  // Unique authors
  const authors = new Set(posts.map(p => p.author_id || p.user_id).filter(Boolean));
  document.getElementById('statAuthors').textContent = authors.size || 1;

  // Featured — first post
  const fp = posts[0];
  if (fp) {
    const featuredEl = document.getElementById('featuredPost');
    featuredEl.innerHTML = `
      <a href="/info/api/post/${fp.id}" class="featured-post">
        <div>
          <div class="featured-label">გამორჩეული პოსტი</div>
          <div class="featured-title">${fp.title}</div>
          <div class="featured-excerpt">${fp.content ? fp.content.substring(0, 160) + '...' : 'წაიკითხეთ პოსტი...'}</div>
          <div class="featured-meta">
            ${fp.category ? `<span class="cat-badge">${fp.category.title}</span>` : ''}
            <span>${new Date(fp.created_at).toLocaleDateString('ka-GE', {year:'numeric', month:'long', day:'numeric'})}</span>
          </div>
        </div>
        <div class="featured-visual">NAWM</div>
      </a>`;
  } else {
    document.getElementById('featuredPost').innerHTML = '<div class="empty">პოსტი არ არის</div>';
  }

  // Grid — next 6 posts
  const grid = document.getElementById('postsGrid');
  const gridPosts = posts.slice(1, 7);
  if (!gridPosts.length) {
    grid.innerHTML = '<div class="empty" style="grid-column:span 3">პოსტები არ არის</div>';
    return;
  }
  gridPosts.forEach(p => {
    const a = document.createElement('a');
    a.href = `/info/api/post/${p.id}`;
    a.className = 'post-card';
    a.innerHTML = `
      <div class="post-card-cat">${p.category ? p.category.title : '—'}</div>
      <div class="post-card-title">${p.title}</div>
      <div class="post-card-excerpt">${p.content ? p.content.substring(0, 100) + '...' : ''}</div>
      <div class="post-card-footer">
        <span>${new Date(p.created_at).toLocaleDateString()}</span>
        <span class="post-arrow">→</span>
      </div>`;
    grid.appendChild(a);
  });
}).catch(err => console.error(err));
</script>
</body>
</html>