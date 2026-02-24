<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>კატეგორიები — Nations at War Mobile</title>
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
  }

  .header-nav {
    display: flex;
    align-items: center;
    gap: 32px;
  }

  .header-nav a {
    text-decoration: none;
    font-size: 13px;
    color: #888;
    letter-spacing: 0.04em;
    transition: color 0.2s;
    font-family: 'Syne', sans-serif;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 11px;
    letter-spacing: 0.1em;
  }

  .header-nav a:hover { color: #fff; }
  .header-nav a.active { color: var(--accent); }

  /* ── HERO ── */
  .hero {
    background: var(--sidebar);
    padding: 72px 48px 60px;
    border-bottom: 1px solid #1a1a1a;
    position: relative;
    overflow: hidden;
  }

  .hero::before {
    content: 'CATEGORIES';
    position: absolute;
    right: 32px;
    top: 50%;
    transform: translateY(-50%);
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 100px;
    color: #ffffff08;
    letter-spacing: -0.02em;
    white-space: nowrap;
    pointer-events: none;
    user-select: none;
  }

  .hero-label {
    font-family: 'Syne', sans-serif;
    font-size: 10px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--accent);
    margin-bottom: 16px;
  }

  .hero h1 {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 42px;
    color: #fff;
    line-height: 1.1;
    max-width: 480px;
  }

  .hero p {
    color: #555;
    font-size: 14px;
    margin-top: 16px;
    max-width: 400px;
    line-height: 1.7;
  }

  /* ── CONTENT ── */
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 56px 48px;
  }

  .section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 32px;
  }

  .section-title {
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 11px;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--text-muted);
  }

  .section-count {
    font-family: 'Syne', sans-serif;
    font-size: 11px;
    color: var(--text-muted);
    letter-spacing: 0.08em;
  }

  /* ── CATEGORY GRID ── */
  .cat-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 64px;
  }

  .cat-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 28px;
    text-decoration: none;
    color: var(--text);
    display: block;
    transition: box-shadow 0.2s, transform 0.2s, border-color 0.2s;
    position: relative;
    overflow: hidden;
  }

  .cat-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: var(--accent);
    opacity: 0;
    transition: opacity 0.2s;
  }

  .cat-card:hover {
    box-shadow: 0 8px 32px rgba(0,0,0,0.08);
    transform: translateY(-3px);
    border-color: #ddd;
  }

  .cat-card:hover::before { opacity: 1; }

  .cat-icon {
    width: 44px;
    height: 44px;
    border-radius: 11px;
    background: var(--bg);
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    margin-bottom: 20px;
    color: var(--accent);
  }

  .cat-name {
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 8px;
    line-height: 1.3;
  }

  .cat-slug {
    font-size: 12px;
    color: var(--text-muted);
    font-family: monospace;
    margin-bottom: 16px;
  }

  .cat-desc {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 20px;
  }

  .cat-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 16px;
    border-top: 1px solid var(--border);
  }

  .cat-count {
    font-family: 'Syne', sans-serif;
    font-size: 11px;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--text-muted);
  }

  .cat-arrow {
    font-size: 14px;
    color: var(--text-muted);
    transition: transform 0.2s, color 0.2s;
  }

  .cat-card:hover .cat-arrow {
    transform: translateX(4px);
    color: var(--accent);
  }

  /* ── FEATURED (first card large) ── */
  .cat-card.featured {
    grid-column: span 2;
    display: flex;
    gap: 28px;
    align-items: flex-start;
  }

  .cat-card.featured .cat-icon {
    flex-shrink: 0;
    width: 56px;
    height: 56px;
    font-size: 22px;
  }

  .cat-card.featured .cat-name {
    font-size: 20px;
  }

  /* ── POSTS PREVIEW LIST ── */
  .posts-section-title {
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 11px;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--text-muted);
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid var(--border);
  }

  .post-row {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 18px 0;
    border-bottom: 1px solid #f0ede8;
    text-decoration: none;
    color: var(--text);
    transition: background 0.15s;
  }

  .post-row:last-child { border-bottom: none; }

  .post-row:hover .post-title { color: var(--accent); }

  .post-number {
    font-family: 'Syne', sans-serif;
    font-size: 11px;
    color: var(--text-muted);
    width: 24px;
    flex-shrink: 0;
    text-align: right;
    letter-spacing: 0.06em;
  }

  .post-info { flex: 1; }

  .post-title {
    font-family: 'Syne', sans-serif;
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 4px;
    transition: color 0.15s;
  }

  .post-meta-row {
    display: flex;
    gap: 12px;
    align-items: center;
  }

  .post-cat-badge {
    font-family: 'Syne', sans-serif;
    font-size: 10px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--accent);
    background: rgba(200,169,110,0.1);
    padding: 2px 8px;
    border-radius: 20px;
  }

  .post-date {
    font-size: 12px;
    color: var(--text-muted);
  }

  /* ── FOOTER ── */
  footer {
    background: var(--sidebar);
    padding: 32px 48px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid #1a1a1a;
    margin-top: 64px;
  }

  .footer-brand {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 12px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--accent);
  }

  .footer-copy {
    font-size: 12px;
    color: #333;
  }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    .cat-grid { grid-template-columns: repeat(2, 1fr); }
    .cat-card.featured { grid-column: span 2; }
    .container, .hero, header, footer { padding-left: 24px; padding-right: 24px; }
  }

  @media (max-width: 600px) {
    .cat-grid { grid-template-columns: 1fr; }
    .cat-card.featured { grid-column: span 1; flex-direction: column; }
    .hero h1 { font-size: 28px; }
    .hero::before { display: none; }
    .header-nav { display: none; }
  }
</style>
</head>
<body>

<header>
  <div class="header-brand">Nations at War Mobile</div>
  <nav class="header-nav">
    <a href="/">მთავარი</a>
    <a href="#" class="active">კატეგორიები</a>
    <a href="/posts">პოსტები</a>
    <a href="/about">შესახებ</a>
  </nav>
</header>

<section class="hero">
  <div class="hero-label">Browse</div>
  <h1>ყველა კატეგორია</h1>
  <p>Nations at War Mobile-ის ბლოგის კატეგორიები — სტრატეგია, სიახლეები, გეიმპლეი და სხვა.</p>
</section>

<div class="container">

  <div class="section-header">
    <span class="section-title">კატეგორიები</span>
    <span class="section-count" id="catCount">— კატეგორია</span>
  </div>

  <div class="cat-grid" id="catGrid">
    <!-- JS fills here -->
  </div>

  <div class="posts-section-title">ბოლო პოსტები</div>
  <div id="recentPosts">
    <!-- JS fills here -->
  </div>

</div>

<footer>
  <div class="footer-brand">Nations at War Mobile</div>
  <div class="footer-copy">© 2025 NAWM Blog</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
const icons = ['◈','◧','◑','◉','◎','◫','⬡','◆'];

axios.get('/info/api/categories').then(res => {
  const cats = res.data.categories;
  document.getElementById('catCount').textContent = cats.length + ' კატეგორია';
  const grid = document.getElementById('catGrid');

  cats.forEach((cat, i) => {
    const a = document.createElement('a');
    a.href = `/category/${cat.slug}`;
    a.className = 'cat-card' + (i === 0 ? ' featured' : '');
    a.innerHTML = `
      <div>
        <div class="cat-icon">${icons[i % icons.length]}</div>
        <div class="cat-name">${cat.name}</div>
        <div class="cat-slug">${cat.slug}</div>
        ${cat.description ? `<div class="cat-desc">${cat.description}</div>` : ''}
        <div class="cat-meta">
          <span class="cat-count">${cat.posts_count || 0} პოსტი</span>
          <span class="cat-arrow">→</span>
        </div>
      </div>`;
    grid.appendChild(a);
  });
}).catch(err => console.error(err));

axios.get('/info/api/posts').then(res => {
  const posts = res.data.posts.slice(0, 8);
  const container = document.getElementById('recentPosts');
  posts.forEach((p, i) => {
    const a = document.createElement('a');
    a.href = `/post/${p.id}`;
    a.className = 'post-row';
    a.innerHTML = `
      <span class="post-number">0${i+1}</span>
      <div class="post-info">
        <div class="post-title">${p.title}</div>
        <div class="post-meta-row">
          ${p.category ? `<span class="post-cat-badge">${p.category.title}</span>` : ''}
          <span class="post-date">${new Date(p.created_at).toLocaleDateString()}</span>
        </div>
      </div>
      <span class="cat-arrow">→</span>`;
    container.appendChild(a);
  });
}).catch(err => console.error(err));
</script>
</body>
</html>