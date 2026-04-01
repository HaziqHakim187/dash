tailwind.config = {
    theme: {
        extend: {}
    }
}

const cardsData = [
    {
    id: 'total-staff',
    title: 'Total LUNAS Staff',
    value: 248,
    icon: 'users',
    subtitle: 'Active personnel',
    accent: '#3b82f6',
    accentBg: 'rgba(59,130,246,0.1)',
    barWidth: 100
},
    { 
      id: 'total-subcontractor', 
      title: 'Total Subcontractor at Yard', 
      value: 156, 
      icon: 'briefcase', 
      subtitle: 'Active contractors', 
      accent: '#a855f7', 
      accentBg: 'rgba(168,85,247,0.1)', 
      barWidth: 85 
},
    {
    id: 'mc',
    title: 'Total on MC',
    value: 12,
    icon: 'thermometer',
    subtitle: 'Medical certificate',
    accent: '#ef4444',
    accentBg: 'rgba(239,68,68,0.1)',
    barWidth: 48
},
    {
    id: 'on-leave',
    title: 'Total On Leave',
    value: 18,
    icon: 'calendar-off',
    subtitle: 'Approved leave',
    accent: '#f59e0b',
    accentBg: 'rgba(245,158,11,0.1)',
    barWidth: 72
},
    {
    id: 'lcs1',
    title: 'Onboard LCS1',
    value: 34,
    icon: 'anchor',
    subtitle: 'LCS1 deployment',
    accent: '#06b6d4',
    accentBg: 'rgba(6,182,212,0.1)',
    barWidth: 68
},
    {
    id: 'lcs2',
    title: 'Onboard LCS2',
    value: 31,
    icon: 'anchor',
    subtitle: 'LCS2 deployment',
    accent: '#8b5cf6',
    accentBg: 'rgba(139,92,246,0.1)',
    barWidth: 62
},
    {
    id: 'lcs3',
    title: 'Onboard LCS3',
    value: 28,
    icon: 'anchor',
    subtitle: 'LCS3 deployment',
    accent: '#10b981',
    accentBg: 'rgba(16,185,129,0.1)',
    barWidth: 56
},
    {
    id: 'lcs4',
    title: 'Onboard LCS4',
    value: 36,
    icon: 'anchor',
    subtitle: 'LCS4 deployment',
    accent: '#ec4899',
    accentBg: 'rgba(236,72,153,0.1)',
    barWidth: 72
},
    {
    id: 'lcs5',
    title: 'Onboard LCS5',
    value: 29,
    icon: 'anchor',
    subtitle: 'LCS5 deployment',
    accent: '#14b8a6',
    accentBg: 'rgba(20,184,166,0.1)',
    barWidth: 58
},
    {
    id: 'kdjebat',
    title: 'KD Jebat',
    value: 42,
    icon: 'shield',
    subtitle: 'KD Jebat deployment',
    accent: '#f97316',
    accentBg: 'rgba(249,115,22,0.1)',
    barWidth: 84
}
];

    function buildCard(card, index) {
        const delay = index * 0.07;
        return `
        <div class="card-glow card-shine pulse-number animate-card rounded-2xl p-5 flex flex-col justify-between"
        style="animation-delay:${delay}s;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);backdrop-filter:blur(12px);min-height:170px;transition:all 0.3s ease;">

      <div class="flex items-start justify-between">
        <div>
          <p class="text-xs font-600 uppercase tracking-widest text-gray-400">
            ${card.title}
          </p>
          <p class="text-xs mt-1 text-gray-500">
            ${card.subtitle}
          </p>
        </div>

        <div class="flex items-center justify-center rounded-xl"
             style="width:44px;height:44px;background:${card.accentBg};border:1px solid ${card.accent}20;">
          <i data-lucide="${card.icon}" style="width:20px;height:20px;color:${card.accent};"></i>
        </div>
      </div>

      <div class="mt-4">
        <span class="num-value text-4xl font-bold text-white">
          ${card.value}
        </span>
        <span class="text-sm text-gray-400 ml-2">orang</span>
      </div>

      <div class="stat-bar mt-4">
        <div class="stat-bar-fill"
             style="width:${card.barWidth}%;background:${card.accent};">
        </div>
      </div>

    </div>
  `;
}

    function renderCards() {
      const grid = document.getElementById('card-grid');
      grid.innerHTML = cardsData.map((c, i) => buildCard(c, i)).join('');
      lucide.createIcons();
    }

    function setDate() {
      const now = new Date();
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      document.getElementById('current-date').textContent = now.toLocaleDateString('ms-MY', options);
    }

    renderCards();
    setDate();

    const defaultConfig = {
      dashboard_title: 'Staff Overview Dashboard',
      background_color: '#0b1120',
      surface_color: 'rgba(255,255,255,0.03)',
      text_color: '#f1f5f9',
      primary_action: '#3b82f6',
      secondary_action: '#64748b',
      font_family: 'Plus Jakarta Sans',
      font_size: 16
    };

    function applyConfig(config) {
      const title = config.dashboard_title || defaultConfig.dashboard_title;
      const bg = config.background_color || defaultConfig.background_color;
      const textCol = config.text_color || defaultConfig.text_color;
      const secAction = config.secondary_action || defaultConfig.secondary_action;
      const fontFamily = config.font_family || defaultConfig.font_family;
      const fontSize = config.font_size || defaultConfig.font_size;

      document.getElementById('dashboard-title').textContent = title;
      document.getElementById('app-wrapper').style.background = bg;

      document.getElementById('dashboard-title').style.color = textCol;
      document.getElementById('dashboard-title').style.fontFamily = `${fontFamily}, sans-serif`;
      document.getElementById('dashboard-title').style.fontSize = `${fontSize * 1.5}px`;

      document.querySelectorAll('.num-value').forEach(el => {
        el.style.color = textCol;
        el.style.fontFamily = `${fontFamily}, sans-serif`;
        el.style.fontSize = `${fontSize * 2.5}px`;
      });

      document.querySelectorAll('p, span').forEach(el => {
        el.style.fontFamily = `${fontFamily}, sans-serif`;
      });
    }

    if (window.elementSdk) {
      window.elementSdk.init({
        defaultConfig,
        onConfigChange: async (config) => {
          applyConfig(config);
        },
        mapToCapabilities: (config) => ({
          recolorables: [
            {
              get: () => config.background_color || defaultConfig.background_color,
              set: (v) => { config.background_color = v; window.elementSdk.setConfig({ background_color: v }); }
            },
            {
              get: () => config.surface_color || defaultConfig.surface_color,
              set: (v) => { config.surface_color = v; window.elementSdk.setConfig({ surface_color: v }); }
            },
            {
              get: () => config.text_color || defaultConfig.text_color,
              set: (v) => { config.text_color = v; window.elementSdk.setConfig({ text_color: v }); }
            },
            {
              get: () => config.primary_action || defaultConfig.primary_action,
              set: (v) => { config.primary_action = v; window.elementSdk.setConfig({ primary_action: v }); }
            },
            {
              get: () => config.secondary_action || defaultConfig.secondary_action,
              set: (v) => { config.secondary_action = v; window.elementSdk.setConfig({ secondary_action: v }); }
            }
          ],
          borderables: [],
          fontEditable: {
            get: () => config.font_family || defaultConfig.font_family,
            set: (v) => { config.font_family = v; window.elementSdk.setConfig({ font_family: v }); }
          },
          fontSizeable: {
            get: () => config.font_size || defaultConfig.font_size,
            set: (v) => { config.font_size = v; window.elementSdk.setConfig({ font_size: v }); }
          }
        }),
        mapToEditPanelValues: (config) => new Map([['dashboard_title', config.dashboard_title || defaultConfig.dashboard_title]])
    });
}