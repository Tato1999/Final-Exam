<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>შესახებ — Nations at War Mobile</title>
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
  .hero { background: var(--sidebar); padding: 72px 48px 64px; border-bottom: 1px solid #1a1a1a; position: relative; overflow: hidden; }
  .hero::after { content: 'NAWM'; position: absolute; right: -8px; bottom: -24px; font-family: 'Syne', sans-serif; font-weight: 800; font-size: 160px; color: #ffffff04; letter-spacing: -0.04em; pointer-events: none; user-select: none; line-height: 1; }
  .hero-inner { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; position: relative; z-index: 1; }
  .hero-label { font-family: 'Syne', sans-serif; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); margin-bottom: 18px; display: flex; align-items: center; gap: 10px; }
  .hero-label::before { content: ''; display: block; width: 24px; height: 1px; background: var(--accent); }
  .hero h1 { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 46px; color: #fff; line-height: 1.1; margin-bottom: 24px; }
  .hero h1 span { color: var(--accent); }
  .hero-desc { color: #555; font-size: 15px; line-height: 1.8; }

  /* HERO RIGHT — decorative stat boxes */
  .hero-boxes { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
  .hero-box { background: #181818; border: 1px solid #222; border-radius: 12px; padding: 22px; position: relative; overflow: hidden; }
  .hero-box::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: var(--accent); }
  .hero-box:nth-child(2)::before { background: var(--accent2); }
  .hero-box:nth-child(3)::before { background: #2980b9; }
  .hero-box:nth-child(4)::before { background: #27ae60; }
  .hero-box-value { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 30px; color: #fff; line-height: 1; margin-bottom: 6px; }
  .hero-box-label { font-family: 'Syne', sans-serif; font-size: 10px; letter-spacing: 0.1em; text-transform: uppercase; color: #444; }

  /* SECTIONS */
  .container { max-width: 1200px; margin: 0 auto; padding: 72px 48px; }

  .section-label { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 10px; letter-spacing: 0.16em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 32px; display: flex; align-items: center; gap: 10px; }
  .section-label::before { content: ''; display: block; width: 20px; height: 2px; background: var(--accent); }

  /* ABOUT TEXT */
  .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 56px; margin-bottom: 72px; align-items: start; }
  .about-text h2 { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 28px; line-height: 1.2; margin-bottom: 20px; }
  .about-text p { font-size: 14.5px; color: #444; line-height: 1.85; margin-bottom: 18px; }
  .about-text p:last-child { margin-bottom: 0; }

  /* FEATURE LIST */
  .feature-list { display: flex; flex-direction: column; gap: 16px; }
  .feature-item { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 22px 24px; display: flex; gap: 18px; align-items: flex-start; transition: box-shadow 0.2s, transform 0.2s; }
  .feature-item:hover { box-shadow: 0 4px 20px rgba(0,0,0,0.06); transform: translateY(-1px); }
  .feature-icon { width: 40px; height: 40px; border-radius: 10px; background: var(--bg); border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; color: var(--accent); }
  .feature-title { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 14px; margin-bottom: 5px; }
  .feature-desc { font-size: 13px; color: var(--text-muted); line-height: 1.6; }

  /* DIVIDER */
  .divider { height: 1px; background: var(--border); margin: 0 0 72px; }

  /* TEAM */
  .team-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 72px; }
  .team-card { background: var(--surface); border: 1px solid var(--border); border-radius: 14px; padding: 28px; text-align: center; transition: box-shadow 0.2s, transform 0.2s; }
  .team-card:hover { box-shadow: 0 6px 24px rgba(0,0,0,0.07); transform: translateY(-2px); }
  .team-avatar { width: 64px; height: 64px; border-radius: 50%; background: var(--sidebar); border: 2px solid #222; display: flex; align-items: center; justify-content: center; font-family: 'Syne', sans-serif; font-weight: 800; font-size: 20px; color: var(--accent); margin: 0 auto 16px; }
  .team-name { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 15px; margin-bottom: 4px; }
  .team-role { font-size: 12px; color: var(--text-muted); font-family: 'Syne', sans-serif; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 12px; }
  .team-bio { font-size: 13px; color: var(--text-muted); line-height: 1.65; }

  /* TIMELINE */
  .timeline { position: relative; padding-left: 32px; margin-bottom: 72px; }
  .timeline::before { content: ''; position: absolute; left: 6px; top: 4px; bottom: 4px; width: 2px; background: var(--border); }
  .timeline-item { position: relative; margin-bottom: 36px; }
  .timeline-item:last-child { margin-bottom: 0; }
  .timeline-dot { position: absolute; left: -29px; top: 4px; width: 12px; height: 12px; border-radius: 50%; background: var(--surface); border: 2px solid var(--accent); }
  .timeline-year { font-family: 'Syne', sans-serif; font-size: 10px; letter-spacing: 0.12em; text-transform: uppercase; color: var(--accent); margin-bottom: 6px; }
  .timeline-title { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 15px; margin-bottom: 6px; }
  .timeline-desc { font-size: 13.5px; color: var(--text-muted); line-height: 1.7; }

  /* CTA */
  .cta-band { background: var(--sidebar); border-radius: 16px; padding: 52px 48px; display: flex; align-items: center; justify-content: space-between; gap: 32px; flex-wrap: wrap; position: relative; overflow: hidden; }
  .cta-band::before { content: '◈'; position: absolute; right: 40px; font-family: 'Syne', sans-serif; font-size: 120px; color: #ffffff04; pointer-events: none; line-height: 1; }
  .cta-band h2 { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 26px; color: #fff; line-height: 1.2; margin-bottom: 8px; }
  .cta-band p { font-size: 14px; color: #555; max-width: 400px; line-height: 1.7; }
  .cta-btns { display: flex; gap: 12px; flex-shrink: 0; }
  .btn-primary { padding: 12px 28px; background: var(--accent); color: var(--sidebar); font-family: 'Syne', sans-serif; font-weight: 700; font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; border: none; border-radius: 8px; cursor: pointer; text-decoration: none; display: inline-block; transition: opacity 0.2s; }
  .btn-primary:hover { opacity: 0.85; }
  .btn-ghost { padding: 12px 28px; background: none; color: #888; font-family: 'Syne', sans-serif; font-weight: 700; font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; border: 1px solid #2a2a2a; border-radius: 8px; cursor: pointer; text-decoration: none; display: inline-block; transition: all 0.2s; }
  .btn-ghost:hover { border-color: #444; color: #ccc; }

  /* FOOTER */
  footer { background: var(--sidebar); padding: 32px 48px; display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #1a1a1a; margin-top: 72px; }
  .footer-brand { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 12px; letter-spacing: 0.12em; text-transform: uppercase; color: var(--accent); }
  .footer-copy { font-size: 12px; color: #333; }

  @media (max-width: 900px) {
    .hero-inner { grid-template-columns: 1fr; gap: 40px; }
    .about-grid { grid-template-columns: 1fr; }
    .team-grid { grid-template-columns: repeat(2, 1fr); }
    .container, header, .breadcrumb, .hero, footer { padding-left: 20px; padding-right: 20px; }
    .cta-band { padding: 36px 28px; }
  }
  @media (max-width: 600px) {
    .hero h1 { font-size: 30px; }
    .hero::after { display: none; }
    .header-nav { display: none; }
    .team-grid { grid-template-columns: 1fr; }
    .hero-boxes { grid-template-columns: 1fr 1fr; }
    .cta-btns { flex-direction: column; }
  }
</style>
</head>
<body>

<header>
  <a href="/" class="header-brand">Nations at War Mobile</a>
  <nav class="header-nav">
    <a href="/">მთავარი</a>
    <a href="/categories">კატეგორიები</a>
    <a href="/posts">პოსტები</a>
    <a href="/about" class="active">შესახებ</a>
  </nav>
</header>

<div class="breadcrumb">
  <a href="/">მთავარი</a>
  <span class="sep">›</span>
  <span>შესახებ</span>
</div>

<!-- HERO -->
<section class="hero">
  <div class="hero-inner">
    <div>
      <div class="hero-label">შესახებ</div>
      <h1>Nations at War<br><span>Mobile</span></h1>
      <p class="hero-desc">სტრატეგიული მობილური თამაშის ოფიციალური ბლოგი. სიახლეები, გაიდები, პატჩ ნოუთები და ანალიზი — ყველაფერი ერთ ადგილზე.</p>
    </div>
    <div class="hero-boxes" id="heroBoxes">
      <div class="hero-box">
        <div class="hero-box-value" id="boxPosts">—</div>
        <div class="hero-box-label">სულ პოსტი</div>
      </div>
      <div class="hero-box">
        <div class="hero-box-value" id="boxCats">—</div>
        <div class="hero-box-label">კატეგორია</div>
      </div>
      <div class="hero-box">
        <div class="hero-box-value" id="boxAuthors">—</div>
        <div class="hero-box-label">ავტორი</div>
      </div>
      <div class="hero-box">
        <div class="hero-box-value">2024</div>
        <div class="hero-box-label">დაარსებული</div>
      </div>
    </div>
  </div>
</section>

<div class="container">

  <!-- ABOUT -->
  <div class="section-label">ჩვენ შესახებ</div>
  <div class="about-grid">
    <div class="about-text">
      <h2>ვინ ვართ ჩვენ?</h2>
      <p>Nations at War Mobile Blog არის NAWM-ის ოფიციალური კონტენტის პლატფორმა. ჩვენ ვქმნით სტრატეგიულ გაიდებს, ვაქვეყნებთ სიახლეებს და ვაანალიზებთ თამაშის მეტა-ს, რათა NAWM-ის ყველა მოთამაშე მუდმივად განახლებული იყოს.</p>
      <p>ბლოგი დაარსდა 2024 წელს პატარა გუნდის მიერ, რომელსაც სჯეროდა, რომ თამაშის სათემო კონტენტი განსაკუთრებით მნიშვნელოვანია მოთამაშეების გათანაბრებულ განვითარებაში.</p>
      <p>დღეს ჩვენ გვყავს ათობით ავტორი სხვადასხვა ქვეყნიდან, რომლებიც ყოველდღიურად ქმნიან ხარისხიან კონტენტს.</p>
    </div>
    <div class="feature-list">
      <div class="feature-item">
        <div class="feature-icon">◧</div>
        <div>
          <div class="feature-title">სიახლეები & პატჩ ნოუთები</div>
          <div class="feature-desc">ყველა განახლება, ბალანსის ცვლილება და ახალი ფიჩერი — პირველ ხელთ.</div>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">◈</div>
        <div>
          <div class="feature-title">სტრატეგიული გაიდები</div>
          <div class="feature-desc">დამწყებიდან პროფამდე — ნაბიჯ-ნაბიჯ გაიდები ყველა დონისთვის.</div>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">◑</div>
        <div>
          <div class="feature-title">მეტა ანალიზი</div>
          <div class="feature-desc">სიღრმისეული ანალიზი მიმდინარე მეტა-ს, ტოპ სტრატეგიების და ტურნირების.</div>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">◉</div>
        <div>
          <div class="feature-title">სათემო კონტენტი</div>
          <div class="feature-desc">მოთამაშეების ამბები, ინტერვიუები და სათემო ღონისძიებები.</div>
        </div>
      </div>
    </div>
  </div>

  <div class="divider"></div>

  <!-- TEAM -->
  <div class="section-label">გუნდი</div>
  <div class="team-grid">
    <div class="team-card">
      <div class="team-avatar">G</div>
      <div class="team-name">გიორგი მ.</div>
      <div class="team-role">მთავარი რედაქტორი</div>
      <div class="team-bio">NAWM-ის ვეტერანი მოთამაშე. ბლოგის დამფუძნებელი და სტრატეგიული კონტენტის ხელმძღვანელი.</div>
    </div>
    <div class="team-card">
      <div class="team-avatar">A</div>
      <div class="team-name">ანა კ.</div>
      <div class="team-role">კონტენტ მენეჯერი</div>
      <div class="team-bio">ყოველდღიური სიახლეები და პატჩ ნოუთების ანალიზი. სათემო ურთიერთობების კოორდინატორი.</div>
    </div>
    <div class="team-card">
      <div class="team-avatar">D</div>
      <div class="team-name">დავით ბ.</div>
      <div class="team-role">ტექნიკური ავტორი</div>
      <div class="team-bio">სიღრმისეული გაიდები და მეტა ანალიზი. ტურნირების კომენტატორი და NAWM-ის ექსპერტი.</div>
    </div>
  </div>

  <div class="divider"></div>

  <!-- TIMELINE -->
  <div class="section-label">ისტორია</div>
  <div class="timeline">
    <div class="timeline-item">
      <div class="timeline-dot"></div>
      <div class="timeline-year">2024 — იანვარი</div>
      <div class="timeline-title">ბლოგის დაარსება</div>
      <div class="timeline-desc">Nations at War Mobile Blog გაიხსნა პირველი 3 კატეგორიით: სიახლეები, გაიდები, მეტა. პირველი კვირა — 500+ ვიზიტორი.</div>
    </div>
    <div class="timeline-item">
      <div class="timeline-dot"></div>
      <div class="timeline-year">2024 — მარტი</div>
      <div class="timeline-title">გუნდის გაფართოება</div>
      <div class="timeline-desc">3 ახალი ავტორი შემოუერთდა. კვირაში გამოქვეყნებული პოსტების რაოდენობა 5-დან 15-მდე გაიზარდა.</div>
    </div>
    <div class="timeline-item">
      <div class="timeline-dot"></div>
      <div class="timeline-year">2024 — ივნისი</div>
      <div class="timeline-title">10,000 მოსმენა</div>
      <div class="timeline-desc">ბლოგი 10,000 ყოველთვიური მკითხველის ნიშანს მიაღწია. NAWM-ის ოფიციალური პარტნიორობა დადასტურდა.</div>
    </div>
    <div class="timeline-item">
      <div class="timeline-dot"></div>
      <div class="timeline-year">2025 — დღეს</div>
      <div class="timeline-title">ახალი პლატფორმა</div>
      <div class="timeline-desc">სრულიად ახალი ადმინ პანელი და ბლოგის სისტემა. უფრო სწრაფი, უფრო მოხერხებული, უფრო ლამაზი.</div>
    </div>
  </div>

  <!-- CTA -->
  <div class="cta-band">
    <div>
      <h2>დაიწყე კითხვა ახლავე</h2>
      <p>ასობით პოსტი გელოდება — სტრატეგია, სიახლეები, გაიდები. ყველაფერი Nations at War Mobile-ის შესახებ.</p>
    </div>
    <div class="cta-btns">
      <a href="/posts" class="btn-primary">ყველა პოსტი</a>
      <a href="/categories" class="btn-ghost">კატეგორიები</a>
    </div>
  </div>

</div>

<footer>
  <div class="footer-brand">Nations at War Mobile</div>
  <div class="footer-copy">© 2025 NAWM Blog</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
Promise.all([
  axios.get('info/api/posts'),
  axios.get('info/api/categories')
]).then(([postsRes, catsRes]) => {
  const posts = postsRes.data.posts;
  const cats = catsRes.data.categories;
  const authors = new Set(posts.map(p => p.author_id || p.user_id).filter(Boolean));

  document.getElementById('boxPosts').textContent = posts.length;
  document.getElementById('boxCats').textContent = cats.length;
  document.getElementById('boxAuthors').textContent = authors.size || 1;
}).catch(err => console.error(err));
</script>
</body>
</html>