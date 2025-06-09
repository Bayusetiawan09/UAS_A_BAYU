<div class="content-wrapper">
  <section class="content-header">
    <h1>Selamat datang di Dashboard Manajer</h1>
  </section>

  <section class="content">
    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 20px;">
      <a href="<?= base_url('laporan'); ?>" style="
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 220px;
        height: 120px;
        background-color: #007bff;
        color: white;
        border-radius: 12px;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
      "
      onmouseover="this.style.backgroundColor='#0056b3'; this.style.boxShadow='0 6px 15px rgba(0,86,179,0.5)';"
      onmouseout="this.style.backgroundColor='#007bff'; this.style.boxShadow='0 4px 10px rgba(0,123,255,0.3)';"
      >
        <i class="fas fa-file-alt" style="font-size: 40px; margin-bottom: 10px;"></i>
        <span style="font-size: 18px; font-weight: 600;">BuatLaporan</span>
      </a>
    </div>
  </section>
</div>
