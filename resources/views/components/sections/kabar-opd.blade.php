@props(['number'])

{{-- Kabar OPD --}}
<section class="w-full grid-pattern py-28">
  <div class="max-w-screen-lg px-2 mx-auto grid gap-10">
    <p class="text-3xl md:text-5xl font-medium text-slate-50">Kabar OPD</p>
    <div id="kabar-opd-list" class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-8">
      {{-- Loading state --}}
      @for ($i = 0; $i < $number; $i++)
        <div class="w-full space-y-2 bg-gray-100 rounded-lg p-4 animate-pulse h-48"></div>
      @endfor
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', async () => {
      const sources = {
        dprd: 'https://dprd.karimunkab.go.id/wp-json/wp/v2/posts',
        bkpsdm: 'https://bkpsdm.karimunkab.go.id/wp-json/wp/v2/posts',
        dpmptsp: 'https://dpmptsp.karimunkab.go.id/wp-json/wp/v2/posts',
        disdik: 'https://disdik.karimunkab.go.id/wp-json/wp/v2/posts',
        dinkes: 'https://dinkes.karimunkab.go.id/wp-json/wp/v2/posts'
      };

      const fetchPosts = async () => {
        const allPosts = [];

        for (const [author, url] of Object.entries(sources)) {
          try {
            const res = await fetch(url);
            const data = await res.json();
            const simplified = data.map(post => ({
              date: post.date,
              author: author,
              title: post.title.rendered,
              slug: post.slug,
              url: post.link
            }));
            allPosts.push(...simplified);
          } catch (err) {
            console.error(`Gagal memuat dari ${author}`, err);
          }
        }

        // Sortir tanggal
        return allPosts.sort((a, b) => new Date(b.date) - new Date(a.date));
      };

      const renderPosts = async () => {
        const container = document.getElementById('kabar-opd-list');
        const posts = await fetchPosts();

        if (posts.length === 0) {
          container.innerHTML = '<p class="text-white">Tidak ada kabar OPD tersedia saat ini.</p>';
          return;
        }

        container.innerHTML = '';

        posts.slice(0, {{ $number }}).forEach(post => {
          const postDate = new Date(post.date);
          const dateString = postDate.toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
          });

          const el = document.createElement('div');
          el.className =
            "w-full flex flex-col justify-between space-y-2 bg-gray-50 hover:bg-white cursor-pointer rounded-lg p-4 text-slate-600";

          el.innerHTML = `
            <p class="text-xl font-medium line-clamp-3 text-slate-700 hover:underline hover:text-orange-600">
              <a href="${post.url}" target="_blank">${post.title}</a>
            </p>
            <div class="border-t border-slate-300 pt-2">
              <div class="flex items-center gap-1 ">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                <path d="M16 3l0 4" />
                <path d="M8 3l0 4" />
                <path d="M4 11l16 0" />
                <path d="M8 15h2v2h-2z" />
              </svg>
              <p>${dateString}</p>
            </div>
            <div class="flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                <path d="M3.6 9h16.8" />
                <path d="M3.6 15h16.8" />
                <path d="M11.5 3a17 17 0 0 0 0 18" />
                <path d="M12.5 3a17 17 0 0 1 0 18" />
              </svg>
              <a href="${post.url}" class="hover:underline uppercase" target="_blank">
                ${post.author}
              </a>
            </div>
            </div>
          `;

          container.appendChild(el);
        });
      };

      renderPosts();
    });
  </script>
</section>
