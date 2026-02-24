<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>კატეგორია — Nations at War Mobile</title>
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
  .hero { background: var(--sidebar); padding: 56px 48px 48px; border-bottom: 1px solid #1a1a1a; position: relative; overflow: hidden; }
  .hero::after { content: attr(data-cat); position: absolute; right: 24px; bottom: -16px; font-family: 'Syne', sans-serif; font-weight: 800; font-size: 120px; color: #ffffff05; letter-spacing: -0.04em; pointer-events: none; user-select: none; line-height: 1; white-space: nowrap; }
  .hero-inner { max-width: 1200px; margin: 0 auto; position: relative; z-index: 1; }
  .hero-label { font-family: 'Syne', sans-serif; font-size: 10px; letter-spacing: 0.18em; text-transform: uppercase; color: var(--accent); margin-bottom: 14px; display: flex; align-items: center; gap: 10px; }
  .hero-label::before { content: '◑'; }
  .hero h1 { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 40px; color: #fff; line-height: 1.1; margin-bottom: 14px; }
  .hero-meta { display: flex; align-items: center; gap: 20px; }
  .hero-count { font-family: 'Syne', sans-serif; font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; color: #444; }
  .hero-slug { font-family: monospace; font-size: 12px; color: #333; background: #1a1a1a; padding: 3px 10px; border-radius: 4px; }

  /* LAYOUT */
  .page-layout { max-width: 1200px; margin: 0 auto; padding: 48px 48px; display: grid; grid-template-columns: 1fr 280px; gap: 48px; align-items: start; }

  /* POSTS LIST */
  .posts-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
  .posts-label { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 10px; letter-spacing: 0.14em; text-transform: uppercase; color: var(--text-muted); display: flex; align-items: center; gap: 8px; }
  .posts-label::before { content: ''; display: block; width: 18px; height: 2px; background: var(--accent); }

  .filter-bar { display: flex; gap: 8px; }
  .filter-btn { padding: 6px 14px; border: 1px solid var(--border); border-radius: 6px; background: none; font-family: 'Syne', sans-serif; font-size: 10px; letter-spacing: 0.08em; text-transform: uppercase; color: var(--text-muted); cursor: pointer; transition: all 0.15s; }
  .filter-btn.active, .filter-btn:hover { background: var(--sidebar); color: var(--accent); border-color: var(--sidebar); }

  /* POST CARD */
  .post-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 28px;
    text-decoration: none;
    color: var(--text);
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 16px;
    align-items: start;
    margin-bottom: 16px;
    transition: box-shadow 0.2s, transform 0.2s, border-color 0.2s;
    position: relative;
    overflow: hidden;
  }

  .post-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 3px; height: 100%;
    background: var(--accent);
    opacity: 0;
    transition: opacity 0.2s;
  }

  .post-card:hover { box-shadow: 0 8px 28px rgba(0,0,0,0.07); transform: translateY(-2px); border-color: #ddd; }
  .post-card:hover::before { opacity: 1; }

  .post-num { font-family: 'Syne', sans-serif; font-size: 11px; color: var(--text-muted); margin-bottom: 10px; letter-spacing: 0.06em; }
  .post-title { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 17px; line-height: 1.3; margin-bottom: 10px; transition: color 0.15s; }
  .post-card:hover .post-title { color: var(--accent2); }
  .post-excerpt { font-size: 13.5px; color: var(--text-muted); line-height: 1.7; margin-bottom: 18px; }
  .post-meta { display: flex; align-items: center; gap: 12px; font-size: 12px; color: var(--text-muted); }

  .badge-status { font-family: 'Syne', sans-serif; font-size: 10px; letter-spacing: 0.08em; text-transform: uppercase; padding: 3px 9px; border-radius: 20px; font-weight: 600; }
  .badge-published { background: #e8f5e9; color: #2e7d32; }
  .badge-draft { background: #fff3e0; color: #e65100; }

  .post-arrow-box { width: 40px; height: 40px; border: 1px solid var(--border); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 16px; color: var(--text-muted); margin-top: 4px; transition: all 0.2s; flex-shrink: 0; }
  .post-card:hover .post-arrow-box { background: var(--sidebar); color: var(--accent); border-color: var(--sidebar); }

  /* EMPTY */
  .empty { text-align: center; padding: 64px 24px; color: var(--text-muted); font-family: 'Syne', sans-serif; font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; background: var(--surface); border: 1px solid var(--border); border-radius: 14px; }

  /* SIDEBAR */
  .sidebar-col { display: flex; flex-direction: column; gap: 20px; }
  .sidebar-card { background: var(--surface); border: 1px solid var(--border); border-radius: 14px; overflow: hidden; }
  .sidebar-card-header { padding: 15px 20px; border-bottom: 1px solid var(--border); }
  .sidebar-card-title { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 10px; letter-spacing: 0.14em; text-transform: uppercase; color: var(--text-muted); }

  .cat-item { display: flex; align-items: center; justify-content: space-between; padding: 12px 20px; border-bottom: 1px solid #f5f3ef; text-decoration: none; color: var(--text); transition: background 0.15s; }
  .cat-item:last-child { border-bottom: none; }
  .cat-item:hover { background: var(--bg); }
  .cat-item.current { background: rgba(200,169,110,0.06); }
  .cat-item-name { font-family: 'Syne', sans-serif; font-size: 13px; font-weight: 600; transition: color 0.15s; }
  .cat-item:hover .cat-item-name, .cat-item.current .cat-item-name { color: var(--accent); }
  .cat-item-count { font-size: 11px; color: var(--text-muted); background: var(--bg); padding: 2px 8px; border-radius: 20px; font-family: 'Syne', sans-serif; }

  .recent-post { display: flex; align-items: flex-start; gap: 10px; padding: 13px 20px; border-bottom: 1px solid #f5f3ef; text-decoration: none; color: var(--text); transition: background 0.15s; }
  .recent-post:last-child { border-bottom: none; }
  .recent-post:hover { background: var(--bg); }
  .recent-post-num { font-family: 'Syne', sans-serif; font-size: 10px; color: var(--text-muted); margin-top: 2px; flex-shrink: 0; width: 18px; }
  .recent-post-title { font-family: 'Syne', sans-serif; font-weight: 600; font-size: 12.5px; line-height: 1.4; margin-bottom: 4px; }
  .recent-post-date { font-size: 11px; color: var(--text-muted); }

  /* FOOTER */
  footer { background: var(--sidebar); padding: 32px 48px; display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #1a1a1a; margin-top: 48px; }
  .footer-brand { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 12px; letter-spacing: 0.12em; text-transform: uppercase; color: var(--accent); }
  .footer-copy { font-size: 12px; color: #333; }

  @media (max-width: 900px) {
    .page-layout { grid-template-columns: 1fr; gap: 32px; }
    .page-layout, .breadcrumb, header, footer, .hero { padding-left: 20px; padding-right: 20px; }
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
    <a href="/categories" class="active">კატეგორიები</a>
    <a href="/posts">პოსტები</a>
</nav>
</header>

<div class="breadcrumb">
    <a href="/">მთავარი</a>
    <span class="sep">›</span>
    <a href="/categories">კატეგორიები</a>
    <span class="sep">›</span>
    <span id="breadCat">იტვირთება...</span>
</div>

<section class="hero" id="heroSection" data-cat="">
<div class="hero-inner">
    <div class="hero-label" id="heroLabel">კატეგორია</div>
    <h1 id="heroTitle">იტვირთება...</h1>
    <div class="hero-meta">
        <span class="hero-count" id="heroCount">— პოსტი</span>
        <span class="hero-slug" id="heroSlug"></span>
    </div>
</div>
</section>

<div class="page-layout">


<main>
    <div class="posts-header">
    <div class="posts-label" id="postsLabel">პოსტები</div>
    <div class="filter-bar">
        <button class="filter-btn active" onclick="filterPosts('all', this)">ყველა</button>
        <button class="filter-btn" onclick="filterPosts('published', this)">გამოქვეყნებული</button>
        <button class="filter-btn" onclick="filterPosts('draft', this)">მონახაზი</button>
    </div>
    </div>
    <div id="postsList"></div>
</main>


<aside class="sidebar-col">

    <div class="sidebar-card">
        <div class="sidebar-card-header"><div class="sidebar-card-title">ყველა კატეგორია</div></div>
        <div id="sidebarCats"></div>
    </div>

    <div class="sidebar-card">
        <div class="sidebar-card-header"><div class="sidebar-card-title">ბოლო პოსტები</div></div>
        <div id="sidebarRecent"></div>
    </div>

</aside>
</div>

<footer>
  <div class="footer-brand">Nations at War Mobile</div>
  <div class="footer-copy">© 2025 NAWM Blog</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

const slug = window.location.pathname.split('/').pop() || '';
let allPosts = [];
let currentCatId = null;

function renderPosts(filter = 'all') {
const list = document.getElementById('postsList');
const filtered = filter === 'all' ? allPosts : allPosts.filter(p => p.status === filter);

if (!filtered.length) {
    list.innerHTML = `<div class="empty">პოსტები არ არის</div>`;
    return;
}

list.innerHTML = '';
filtered.forEach((p, i) => {
    const a = document.createElement('a');
    a.href = `/post/${p.id}`;
    a.className = 'post-card';
    a.innerHTML = `
        <div>
            <div class="post-num">№${String(i + 1).padStart(2, '0')}</div>
            <div class="post-title">${p.title}</div>
            <div class="post-excerpt">${p.content ? p.content.substring(0, 140) + '...' : 'წაიკითხეთ სრულად...'}</div>
            <div class="post-meta">
            <span class="badge-status badge-${p.status}">${p.status === 'published' ? 'გამოქვეყნებული' : 'მონახაზი'}</span>
            <span>${new Date(p.created_at).toLocaleDateString('ka-GE', {year:'numeric', month:'long', day:'numeric'})}</span>
            </div>
        </div>
        <div class="post-arrow-box">→</div>`;
        list.appendChild(a);
    });
}

function filterPosts(type, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    renderPosts(type);
}


axios.get('/info/api/categories').then(res => {
const cats = res.data.categories;
const cat = cats.find(c => c.slug === slug) || cats[0];
if (!cat) return;

currentCatId = cat.id;


document.getElementById('heroTitle').textContent = cat.name;
document.getElementById('heroLabel').textContent = 'კატეგორია';
document.getElementById('heroSlug').textContent = cat.slug;
document.getElementById('breadCat').textContent = cat.name;
document.getElementById('heroSection').setAttribute('data-cat', cat.name.toUpperCase());
document.title = cat.name + ' — Nations at War Mobile';


const sidebarCats = document.getElementById('sidebarCats');
cats.forEach(c => {
    const a = document.createElement('a');
    a.href = `/category/${c.slug}`;
    a.className = 'cat-item' + (c.slug === slug ? ' current' : '');
    a.innerHTML = `<span class="cat-item-name">${c.name}</span><span class="cat-item-count">${c.posts_count || 0}</span>`;
    sidebarCats.appendChild(a);
});


return axios.get('/info/api/posts');
    }).then(res => {
    if (!res) return;
        const posts = res.data.posts;

    
    allPosts = posts.filter(p => p.category && p.category_id === currentCatId);

    document.getElementById('heroCount').textContent = allPosts.length + ' პოსტი';
    document.getElementById('postsLabel').textContent = allPosts.length + ' პოსტი';

    renderPosts('all');

    
    const sidebarRecent = document.getElementById('sidebarRecent');
    const recent = posts.filter(p => p.category_id !== currentCatId).slice(0, 5);
    if (!recent.length) {
        sidebarRecent.innerHTML = '<div style="padding:16px 20px;font-size:12px;color:var(--text-muted)">სხვა პოსტი არ არის</div>';
    } else {
        recent.forEach((p, i) => {
        const a = document.createElement('a');
        a.href = `/post/${p.id}`;
        a.className = 'recent-post';
        a.innerHTML = `
            <span class="recent-post-num">0${i+1}</span>
            <div>
            <div class="recent-post-title">${p.title}</div>
            <div class="recent-post-date">${p.category ? p.category.title + ' · ' : ''}${new Date(p.created_at).toLocaleDateString()}</div>
            </div>`;
        sidebarRecent.appendChild(a);
        });
    }
    }).catch(err => {
        console.error(err);
        document.getElementById('postsList').innerHTML = '<div class="empty">ჩატვირთვა ვერ მოხერხდა</div>';
    });
</script>
</body>
</html>