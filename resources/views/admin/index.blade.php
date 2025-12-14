<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>ADMIN QUẢN LÝ</title>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
  :root{
    --sidebar-bg:#0f1724; /* dark */
    --sidebar-accent:#0b1220;
    --primary:#2b9d6f; /* green */
    --accent:#1e90ff; /* blue header */
    --muted:#6b7280;
    --card:#ffffff;
  }
  *{box-sizing:border-box}
  body{
    margin:0;
    font-family: Inter, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    background:#eef2f6;
    color:#111827;
    -webkit-font-smoothing:antialiased;
  }

  /* LAYOUT */
  .wrap{display:flex; min-height:100vh; overflow:hidden;}

  /* SIDEBAR */
  .sidebar{
    width:260px;
    background:var(--sidebar-bg);
    color:#e6eef0;
    transition:width .28s ease;
    overflow:auto;
    padding-bottom:40px;
  }
  .sidebar.collapsed{width:72px}
  .sidebar .brand{
    display:flex; align-items:center; gap:12px;
    padding:18px 18px; border-bottom:1px solid rgba(255,255,255,0.03);
  }
  .brand .logo {
    width:38px;height:38px;border-radius:6px;background:linear-gradient(135deg,#0ea5a6,#2563eb);
    display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;
  }
  .brand .title{font-weight:700;font-size:16px}
  .sidebar ul{list-style:none;padding:12px 6px;margin:0}
  .sidebar li{margin:4px 0}
  .menu-item{
    display:flex;align-items:center;gap:12px;padding:10px 14px;border-radius:8px;color:var(--muted);
    cursor:pointer;font-size:14px;
  }
  .menu-item .icon{width:26px;text-align:center;color:#9ca3af}
  .menu-item:hover{background:rgba(255,255,255,0.03);color:#fff}
  .menu-item.active{background:rgba(255,255,255,0.04);color:#fff}
  .sidebar .submenu{display:none;padding-left:36px;margin-top:6px}
  .sidebar li.open > .submenu{display:block}
  .submenu .sitem{display:flex;align-items:center;gap:10px;padding:8px 8px;border-radius:6px;color:#cbd5e1;font-size:13px}
  .submenu .sitem:hover{background:rgba(255,255,255,0.02);color:#fff}
  .sidebar .divider{height:1px;background:rgba(255,255,255,0.03);margin:12px 8px;border-radius:2px}

  /* TOPBAR */
  .topbar{
    height:64px;background:var(--accent);display:flex;align-items:center;padding:0 18px;color:#fff;gap:12px;
    position:sticky;top:0;z-index:20;
  }
  .topbar .left{display:flex;align-items:center;gap:12px}
  .topbar .hamburger{width:44px;height:44px;display:flex;align-items:center;justify-content:center;border-radius:6px;cursor:pointer}
  .topbar .brand-name{font-weight:700;margin-left:6px}
  .topbar select{
    background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.08);color:#fff;padding:8px;border-radius:6px
  }

  .topbar .right{margin-left:auto;display:flex;align-items:center;gap:10px}
  .icon-btn{width:42px;height:42px;border-radius:8px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#fff}
  .badge{background:#ef4444;color:#fff;font-size:11px;border-radius:12px;padding:2px 7px;margin-left:6px}
  .translate-select{background:transparent;border:none;color:#fff;font-size:14px}

  /* AVATAR */
  .avatar{
    display:flex;align-items:center;gap:10px;padding:6px;border-radius:8px;cursor:pointer;
  }
  .avatar img{width:40px;height:40px;border-radius:50%;object-fit:cover;border:2px solid rgba(255,255,255,0.12)}
  .avatar .meta{display:flex;flex-direction:column;align-items:flex-start}
  .avatar .meta small{color:rgba(255,255,255,0.85);font-size:12px}
  .avatar-menu{position:absolute;right:18px;top:68px;background:#fff;border-radius:8px;box-shadow:0 8px 30px rgba(2,6,23,0.2);width:240px;display:none;z-index:40}
  .avatar-menu .item{padding:12px 14px;border-bottom:1px solid #f1f5f9;color:#111}
  .avatar-menu .item:last-child{border-bottom:none}
  .avatar-menu .item a{color:#111;text-decoration:none}
  .avatar-menu .actions{display:flex;gap:8px;padding:10px 14px}

  /* MAIN */
  .main{
    flex:1;display:flex;flex-direction:column;min-height:100vh;overflow:auto;
  }
  .container{padding:18px}

  /* DASHBOARD LAYOUT */
  .top-cards{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:14px}
  .card{background:var(--card);padding:16px;border-radius:10px;box-shadow:0 6px 18px rgba(10,10,20,0.04)}
  .card .title{color:var(--muted);font-size:13px;margin-bottom:8px}
  .card .value{font-weight:700;font-size:20px}

  /* CHARTS */
  .charts{display:grid;grid-template-columns:2fr 1fr;gap:14px;margin-bottom:14px}
  .chart-card{padding:14px;background:var(--card);border-radius:10px;box-shadow:0 6px 18px rgba(10,10,20,0.04)}

  /* TABLE */
  .table-wrap{background:var(--card);padding:14px;border-radius:10px;box-shadow:0 6px 18px rgba(10,10,20,0.04)}
  table{width:100%;border-collapse:collapse;font-size:14px}
  th,td{padding:10px;border-bottom:1px solid #eef2f6;text-align:left}
  th{background:#f8fafc;color:#0f1724}
  .actions .btn{margin-right:6px}

  /* RIGHT-PANE (profile quick) */
  .right-pane{
    width:320px;padding:18px;position:sticky;top:72px;height:calc(100vh - 90px);overflow:auto;
  }
  .profile-card{background:var(--card);border-radius:10px;padding:14px;text-align:center;box-shadow:0 6px 18px rgba(10,10,20,0.04)}
  .profile-card img{width:90px;height:90px;border-radius:50%;object-fit:cover;margin-bottom:12px}
  .profile-card h4{margin-bottom:6px}
  .profile-card p{color:var(--muted);font-size:13px;margin-bottom:12px}

  /* MODAL (simple) */
  .modal-dim{position:fixed;inset:0;background:rgba(2,6,23,0.5);display:none;align-items:center;justify-content:center;z-index:60}
  .modal-box{background:#fff;padding:20px;border-radius:10px;max-width:720px;width:100%;}

  /* ACTIVITY list */
  .activities{margin-top:12px;list-style:none;padding:0}
  .activities li{padding:10px;border-radius:8px;background:#fff;margin-bottom:8px;border-left:4px solid #e6e6e6}

  /* RESPONSIVE */
  @media(max-width:1100px){
    .top-cards{grid-template-columns:repeat(2,1fr)}
    .charts{grid-template-columns:1fr}
    .right-pane{display:none}
  }
  @media(max-width:780px){
    .sidebar{position:fixed;left:-280px;z-index:50}
    .sidebar.open{left:0}
    .topbar .hamburger{display:inline-flex}
    #content-wrapper{padding:12px}
  }
</style>
</head>
<body>
<div class="wrap">

  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="brand" style="display:flex;align-items:center;padding:18px 16px">
      <div class="logo">VC</div>
      <div style="margin-left:8px">
        <div style="font-weight:700;color:#fff">Lê Trung Tín</div>
        <div style="font-size:12px;color:#9aa4aa">Admin </div>
      </div>
    </div>

    <ul>
      <li>
        <div class="menu-item active" data-page="dashboard"><span class="icon"><i class="fa-solid fa-house"></i></span><span class="label">Bảng điều khiển</span></div>
      </li>

      <li class="has-sub">
        <div class="menu-item" data-toggle="sub-courses"><span class="icon"><i class="fa-solid fa-book"></i></span><span class="label">Khóa học</span><span style="margin-left:auto;color:#8aa0a8"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="submenu" id="sub-courses">
          <div class="sitem" data-page="all-courses">● Tất cả khóa học</div>
          <div class="sitem" data-page="course-categories">● Danh mục khóa học</div>
          <div class="sitem" data-page="course-schedule">● Lịch khai giảng</div>
          <div class="sitem" data-page="course-teachers">● Giảng viên</div>
        </div>
      </li>

      <li class="has-sub">
        <div class="menu-item" data-toggle="sub-foods"><span class="icon"><i class="fa-solid fa-bowl-food"></i></span><span class="label">Món ăn</span><span style="margin-left:auto;color:#8aa0a8"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="submenu" id="sub-foods">
          <div class="sitem" data-page="all-foods"><a href="{{ route('product.index') }} ">● Tất cả món ăn</a></div>
          <div class="sitem" data-page="food-categories">● Danh mục món</div>
          <div class="sitem" data-page="food-recipes">● Công thức</div>
          <div class="sitem" data-page="food-videos">● Video hướng dẫn</div>
        </div>
      </li>

      <li class="has-sub">
        <div class="menu-item" data-toggle="sub-users"><span class="icon"><i class="fa-solid fa-users"></i></span><span class="label">Người dùng</span><span style="margin-left:auto;color:#8aa0a8"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="submenu" id="sub-users">
          <div class="sitem" data-page="students">○ Học viên</div>
          <div class="sitem" data-page="admins">○ Quản trị viên</div>
        </div>
      </li>

      <li>
        <div class="menu-item" data-page="orders"><span class="icon"><i class="fa-solid fa-file-invoice-dollar"></i></span><span class="label">Đơn đăng ký</span></div>
      </li>

      <li>
        <div class="menu-item" data-page="payments"><span class="icon"><i class="fa-solid fa-wallet"></i></span><span class="label">Thanh toán</span></div>
      </li>

      <li class="divider"></li>

      <li>
        <div class="menu-item" data-page="reports"><span class="icon"><i class="fa-solid fa-chart-pie"></i></span><span class="label">Báo cáo</span></div>
      </li>

      <li>
        <div class="menu-item" data-page="settings"><span class="icon"><i class="fa-solid fa-gear"></i></span><span class="label">Cài đặt</span></div>
      </li>
    </ul>
  </aside>

  <!-- MAIN -->
  <main class="main">

    <!-- TOPBAR -->
    <header class="topbar">
      <div class="left">
        <div class="hamburger" id="hamburger">
          <i class="fa-solid fa-bars" style="font-size:18px;color:#fff"></i>
        </div>
        <div class="brand-name">ADMIN QUẢN LÝ</div>

        <select id="site-select" title="Chọn cơ sở">
          <option>Cụm 01</option>
          <option>Cụm 02</option>
        </select>

        <select id="city-select" title="Chọn thành phố">
          <option>Tất cả thành phố</option>
          <option>Hà Nội</option>
          <option>TPHCM</option>
          <option>Huế</option>
        </select>
      </div>

      <div class="right">
        <div class="icon-btn" id="notifyBtn" title="Thông báo (12)">
          <i class="fa-regular fa-bell"></i><span class="badge" id="notifyCount">12</span>
        </div>

        <div class="icon-btn" id="msgBtn" title="Tin nhắn">
          <i class="fa-regular fa-envelope"></i><span class="badge" id="msgCount">3</span>
        </div>

        <div>
          <select class="translate-select" id="langSelect" title="Ngôn ngữ">
            <option value="vi">🇻🇳 VietNam</option>
            <option value="en">🇬🇧 English</option>
          </select>
        </div>

        <div class="avatar" id="avatarBtn">
          <img src="https://i.pravatar.cc/150?img=12" alt="avatar">
          <div class="meta">
            <strong style="color:#fff">Lê Trung Tín</strong>
            <small style="color:rgba(255,255,255,0.85)">Admin</small>
          </div>
        </div>

      </div>
    </header>

    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper" class="container">

      <!-- TOP area: cards -->
      <section id="dashboard" class="page">

        <div style="display:flex;gap:14px;flex-wrap:wrap;margin-bottom:14px">
          <div style="flex:1" class="card">
            <div class="title">Tổng học viên</div>
            <div class="value" id="totalStudents" style="font-size:22px;font-weight:700;color:#0ea5a6">1,240</div>
            <div style="color:var(--muted);font-size:13px;margin-top:6px">Học viên đang tham gia các khóa</div>
          </div>

          <div style="flex:1" class="card">
            <div class="title">Tổng khóa học</div>
            <div class="value" id="totalCourses" style="font-size:22px;font-weight:700;color:#0b78d1">28</div>
            <div style="color:var(--muted);font-size:13px;margin-top:6px">Khóa đang mở</div>
          </div>

          <div style="flex:1" class="card">
            <div class="title">Tổng món ăn</div>
            <div class="value" id="totalFoods" style="font-size:22px;font-weight:700;color:#ef4444">156</div>
            <div style="color:var(--muted);font-size:13px;margin-top:6px">Món trong hệ thống</div>
          </div>

          <div style="flex:1" class="card">
            <div class="title">Doanh thu tháng</div>
            <div class="value" id="revenue" style="font-size:22px;font-weight:700;color:#f59e0b">420,000,000đ</div>
            <div style="color:var(--muted);font-size:13px;margin-top:6px">Doanh thu (tháng hiện tại)</div>
          </div>
        </div>

        <!-- charts + right pane -->
        <div style="display:flex;gap:14px;align-items:flex-start;margin-bottom:14px">
          <div style="flex:2;display:flex;flex-direction:column;gap:14px">
            <div class="chart-card">
              <canvas id="studentsChart" height="120"></canvas>
            </div>

            <div class="chart-card">
              <canvas id="revenueChart" height="120"></canvas>
            </div>
          </div>

          <aside class="right-pane">
            <div class="profile-card">
              <img src="https://i.pravatar.cc/300?img=12" alt="avatar">
              <h4>Lê Trung Tín</h4>
              <p>Admin</p>
              <p style="font-size:14px;color:var(--muted)">📞 0787 661 600</p>
              <div style="display:flex;gap:8px;justify-content:center;margin-top:10px">
                <button class="btn btn-outline-secondary" id="openChangePass">Thay đổi mật khẩu</button>
                <button class="btn btn-outline-danger" onclick="logout()" id="btnLogout">Đăng xuất</button>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                </form>
              </div>
            </div>

            <div style="height:14px"></div>

            <div class="card" style="padding:12px">
              <strong>Hoạt động gần đây</strong>
              <ul class="activities" style="margin-top:10px">
                <li>Ngọc đăng ký khóa Bếp Á</li>
                <li>Admin thêm món Gỏi Cuốn</li>
                <li>Chef Minh cập nhật lịch</li>
              </ul>
            </div>
          </aside>
        </div>

        <!-- table courses -->
        <div class="table-wrap">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
            <strong>Danh sách khóa học</strong>
            <div>
              <button class="btn btn-sm btn-success" id="btnAddCourse">+ Thêm khóa</button>
              <button class="btn btn-sm btn-outline-secondary" id="exportExcel">Xuất Excel</button>
            </div>
          </div>

          <div style="overflow:auto">
            <table>
              <thead><tr>
                <th>STT</th><th>Khóa học</th><th>Giảng viên</th><th>Học viên</th><th>Buổi</th><th>Cơ sở</th><th>Học phí</th><th>Trạng thái</th><th>Hành động</th>
              </tr></thead>
              <tbody id="courseTableBody">
                <!-- dynamic rows -->
              </tbody>
            </table>
          </div>
        </div>

      </section>

      <!-- Other pages (hidden by default) -->
      <section id="all-courses" class="page" style="display:none">
        <h3>Tất cả khóa học</h3>
        <p>Trang quản lý chi tiết khóa học (mô phỏng).</p>
      </section>

      <section id="all-foods" class="page" style="display:none">
        <h3>Tất cả món ăn</h3>
        <p>Danh sách món ăn, thêm sửa xóa, ảnh preview.</p>
      </section>

      <!-- ... more sections can be added similarly ... -->

    </div>
  </main>
</div>

<!-- AVATAR MENU POPUPS -->
<div class="avatar-menu" id="avatarMenu">
  <div class="item"><strong>Lê Trung Tín</strong></div>
  <div class="item">📞 0787 661 600</div>
  <div class="item"><a href="#" onclick="changePass()"id="openChangePass2">Đổi mật khẩu</a></div>
  <div class="item"><a href="#" onclick="logout()" id="logoutLink">Đăng xuất</a></div>
</div>

<!-- NOTIFICATION DROPDOWN (simple) -->
<div class="modal-dim" id="notifModal">
  <div class="modal-box">
    <h5>Thông báo</h5>
    <ul style="margin-top:10px">
      <li>Thông báo 1: Có học viên mới</li>
      <li>Thông báo 2: Đơn đăng ký mới</li>
      <li>Thông báo 3: Lịch thay đổi</li>
    </ul>
    <div style="margin-top:12px;text-align:right"><button class="btn btn-secondary" id="closeNotif">Đóng</button></div>
  </div>
</div>

<!-- MESSAGES DROPDOWN -->
<div class="modal-dim" id="msgModal">
  <div class="modal-box">
    <h5>Tin nhắn</h5>
    <ul style="margin-top:10px">
      <li><strong>Ngọc</strong>: Xin hỏi về lịch...</li>
      <li><strong>Lan</strong>: Tôi muốn đăng ký...</li>
      <li><strong>Minh</strong>: Cần hỗ trợ thanh toán</li>
    </ul>
    <div style="margin-top:12px;text-align:right"><button class="btn btn-secondary" id="closeMsg">Đóng</button></div>
  </div>
</div>

<!-- MODAL: CHANGE PASSWORD -->
<div class="modal-dim" id="modalChangePass">
  <div class="modal-box">
    <h5>Đổi mật khẩu</h5>
    <div style="margin-top:10px">
      <input id="oldPass" placeholder="Mật khẩu cũ" class="form-control" type="password" />
      <div style="height:8px"></div>
      <input id="newPass" placeholder="Mật khẩu mới" class="form-control" type="password" />
      <div style="height:8px"></div>
      <input id="newPass2" placeholder="Nhập lại mật khẩu mới" class="form-control" type="password" />
      <div style="height:12px"></div>
      <div style="text-align:right">
        <button class="btn btn-secondary" id="closeChangePass">Hủy</button>
        <button class="btn btn-primary" id="saveChangePass">Lưu</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL: ADD COURSE -->
<div class="modal-dim" id="modalAddCourse">
  <div class="modal-box">
    <h5>Thêm khóa học mới</h5>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-top:8px">
      <input id="courseName" class="form-control" placeholder="Tên khóa học" />
      <input id="courseTeacher" class="form-control" placeholder="Giảng viên" />
      <input id="courseSessions" class="form-control" placeholder="Số buổi" type="number"/>
      <input id="courseStudents" class="form-control" placeholder="Số học viên" type="number"/>
      <input id="courseFacility" class="form-control" placeholder="Cơ sở" />
      <input id="coursePrice" class="form-control" placeholder="Học phí" />
    </div>
    <div style="height:12px"></div>
    <div style="text-align:right">
      <button class="btn btn-secondary" id="closeAddCourse">Hủy</button>
      <button class="btn btn-success" id="saveAddCourse">Lưu</button>
    </div>
  </div>
</div>

<!-- MODAL: ADD FOOD -->
<div class="modal-dim" id="modalAddFood">
  <div class="modal-box">
    <h5>Thêm món ăn</h5>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-top:8px">
      <input id="foodName" class="form-control" placeholder="Tên món" />
      <select id="foodCategory" class="form-control"><option>Chọn danh mục</option><option>Món nước</option><option>Món chiên</option></select>
      <input id="foodPrice" class="form-control" placeholder="Giá bán" type="number" />
      <input id="foodImage" class="form-control" type="file" accept="image/*" />
      <img id="foodPreview" style="max-width:140px;border-radius:8px;display:none;margin-top:8px"/>
    </div>
    <div style="height:12px"></div>
    <div style="text-align:right">
      <button class="btn btn-secondary" id="closeAddFood">Hủy</button>
      <button class="btn btn-success" id="saveAddFood">Lưu</button>
    </div>
  </div>
</div>

<script>
/* === UI Interactions === */

// Sidebar collapse (desktop) & toggle (mobile)
const sidebar = document.getElementById('sidebar');
const hamburger = document.getElementById('hamburger');
hamburger.addEventListener('click', () => {
  if(window.innerWidth <= 780){
    sidebar.classList.toggle('open');
  } else {
    sidebar.classList.toggle('collapsed');
    // adjust topbar/content margin handled by CSS selectors
  }
});

// submenu toggles
document.querySelectorAll('.has-sub > .menu-item').forEach(item => {
  item.addEventListener('click', (e) => {
    const parent = item.parentElement;
    parent.classList.toggle('open');
  });
});

// pages SPA-like navigation
function hideAllPages(){
  document.querySelectorAll('.page').forEach(p=>p.style.display='none');
}
function showPageById(id){
  hideAllPages();
  const page = document.getElementById(id);
  if(page) page.style.display='block';
  // if small screen, auto close sidebar
  if(window.innerWidth <= 780) sidebar.classList.remove('open');
}
showPageById('dashboard'); // default

// clicking menu items open pages
document.querySelectorAll('[data-page]').forEach(el=>{
  el.addEventListener('click', function(){
    // remove active
    document.querySelectorAll('.menu-item').forEach(mi=>mi.classList.remove('active'));
    // add active to closest .menu-item (if clickable)
    let menuItem = el.closest('.menu-item') || el;
    if(menuItem) menuItem.classList.add('active');

    const page = el.getAttribute('data-page');
    if(page){
      // map some names to element ids used
      const idMap = {
        'all-courses':'all-courses','all-foods':'all-foods',
        'students':'students','admins':'admins',
        'orders':'orders','payments':'payments',
        'reports':'reports','settings':'settings'
      };
      // If id exist show, else show dashboard as fallback
      if(document.getElementById(page)) showPageById(page);
      else if(document.getElementById(idMap[page])) showPageById(idMap[page]);
      else {
        // for pages that not exist, show dashboard with title change
        hideAllPages();
        const dash = document.getElementById('dashboard'); dash.style.display='block';
      }
    }
  });
});


/* === Avatar dropdown === */
const avatarBtn = document.getElementById('avatarBtn');
const avatarMenu = document.getElementById('avatarMenu');
avatarBtn.addEventListener('click', (e)=>{
  e.stopPropagation();
  avatarMenu.style.display = avatarMenu.style.display === 'block' ? 'none' : 'block';
});
document.addEventListener('click', (e)=> {
  if(!avatarBtn.contains(e.target) && !avatarMenu.contains(e.target)) avatarMenu.style.display = 'none';
});

/* === Notifications / messages modals toggle === */
const notifBtn = document.getElementById('notifyBtn');
const notifModal = document.getElementById('notifModal');
const closeNotif = document.getElementById('closeNotif');
notifBtn.addEventListener('click', ()=> { notifModal.style.display='flex'; });
closeNotif.addEventListener('click', ()=> { notifModal.style.display='none'; });

const msgBtn = document.getElementById('msgBtn');
const msgModal = document.getElementById('msgModal');
const closeMsg = document.getElementById('closeMsg');
msgBtn.addEventListener('click', ()=> { msgModal.style.display='flex'; });
closeMsg.addEventListener('click', ()=> { msgModal.style.display='none'; });

/* === Change password modal === */
const modalChangePass = document.getElementById('modalChangePass');
document.getElementById('openChangePass').addEventListener('click', ()=> modalChangePass.style.display='flex');
document.getElementById('openChangePass2').addEventListener('click', ()=> { avatarMenu.style.display='none'; modalChangePass.style.display='flex'; });
document.getElementById('closeChangePass').addEventListener('click', ()=> modalChangePass.style.display='none');

/* === Add course modal === */
const modalAddCourse = document.getElementById('modalAddCourse');
document.getElementById('btnAddCourse').addEventListener('click', ()=> modalAddCourse.style.display='flex');
document.getElementById('closeAddCourse').addEventListener('click', ()=> modalAddCourse.style.display='none');

/* === Add food modal & preview === */
const modalAddFood = document.getElementById('modalAddFood');
document.querySelectorAll('.open-modal').forEach(btn => {
  btn.addEventListener('click', ()=> {
    const id = btn.dataset.modal;
    if(id==='modalFood') modalAddFood.style.display='flex';
    if(id==='modalCourse') modalAddCourse.style.display='flex';
  });
});
document.getElementById('closeAddFood').addEventListener('click', ()=> modalAddFood.style.display='none');

const foodImage = document.getElementById('foodImage');
const foodPreview = document.getElementById('foodPreview');
if(foodImage){
  foodImage.addEventListener('change', e=>{
    const f = e.target.files[0];
    if(!f) return;
    const url = URL.createObjectURL(f);
    foodPreview.src = url; foodPreview.style.display='block';
  });
}

/* close modals when clicking dim */
document.querySelectorAll('.modal-dim').forEach(dim=>{
  dim.addEventListener('click', (e)=>{
    if(e.target === dim) dim.style.display='none';
  });
});

/* === Change password save click (demo) === */
document.getElementById('saveChangePass').addEventListener('click', ()=>{
  alert('Mật khẩu đã được cập nhật (demo).');
  modalChangePass.style.display='none';
});

/* === Save new course (demo to table) === */
const courseTableBody = document.getElementById('courseTableBody');
let courseIdCounter = 1;
function addCourseRow(c){
  const tr = document.createElement('tr');
  tr.innerHTML = `<td>${courseIdCounter++}</td>
    <td>${c.name}</td>
    <td>${c.teacher}</td>
    <td>${c.students}</td>
    <td>${c.sessions}</td>
    <td>${c.facility}</td>
    <td>${c.price}</td>
    <td>${c.status||'Đang mở'}</td>
    <td class="actions"><button class="btn btn-sm btn-primary" onclick="alert('Edit demo')">Sửa</button><button class="btn btn-sm btn-danger" onclick="this.parentElement.parentElement.remove()">Xóa</button></td>`;
  courseTableBody.appendChild(tr);
}
document.getElementById('saveAddCourse').addEventListener('click', ()=>{
  const c = {
    name: document.getElementById('courseName').value || 'Khóa mới',
    teacher: document.getElementById('courseTeacher').value || 'Chưa rõ',
    sessions: document.getElementById('courseSessions').value || 8,
    students: document.getElementById('courseStudents').value || 0,
    facility: document.getElementById('courseFacility').value || 'Cơ sở 01',
    price: document.getElementById('coursePrice').value || '0'
  };
  addCourseRow(c);
  modalAddCourse.style.display='none';
  // clear inputs
  ['courseName','courseTeacher','courseSessions','courseStudents','courseFacility','coursePrice'].forEach(id=>document.getElementById(id).value='');
});

/* === Save new food (demo) === */
document.getElementById('saveAddFood').addEventListener('click', ()=>{
  alert('Món ăn đã thêm (demo).');
  modalAddFood.style.display='none';
});

// Xác nhận đăng xuất //
document.getElementById('btnLogout').addEventListener('click', ()=> alert('Xác nhận đăng xuất?'));
document.getElementById('logoutLink').addEventListener('click', ()=> alert('Xác nhận đăng xuất?'));

/* === Demo data initial rows === */
const demoCourses = [
  {name:'Bếp Á cơ bản',teacher:'Chef Minh',students:20,sessions:12,facility:'Cơ sở 01',price:'3,500,000'},
  {name:'Bánh Âu nâng cao',teacher:'Chef Anna',students:15,sessions:8,facility:'Cơ sở 02',price:'4,200,000'}
];
demoCourses.forEach(c=>addCourseRow(c));

/* === Chart.js setup === */
const studentsCtx = document.getElementById('studentsChart').getContext('2d');
const revenueCtx = document.getElementById('revenueChart').getContext('2d');

const studentsChart = new Chart(studentsCtx, {
  type:'line',
  data:{
    labels:['Thg1','Thg2','Thg3','Thg4','Thg5','Thg6','Thg7','Thg8','Thg9','Thg10','Thg11','Thg12'],
    datasets:[{
      label:'Học viên mới / tháng',
      data:[50,70,90,120,130,140,150,160,170,180,190,200],
      borderColor:'#10b981',
      backgroundColor:'rgba(16,185,129,0.12)',
      fill:true,
      tension:0.3
    }]
  },
  options:{responsive:true,plugins:{legend:{display:false}}}
});

const revenueChart = new Chart(revenueCtx, {
  type:'bar',
  data:{
    labels:['T1','T2','T3','T4','T5','T6'],
    datasets:[{
      label:'Doanh thu (triệu)',
      data:[30,45,60,50,70,90],
      backgroundColor:'#3b82f6'
    }]
  },
  options:{responsive:true,plugins:{legend:{display:false}}}
});

/* === Translate drop change (demo) === */
document.getElementById('langSelect').addEventListener('change', (e)=>{
  alert('Thay đổi ngôn ngữ: '+ e.target.value + ' (demo)');
});

/* === Export Excel demo === */
document.getElementById('exportExcel').addEventListener('click', ()=> alert('Xuất Excel (demo)'));

/* === Responsive behavior tweak === */
window.addEventListener('resize', ()=>{
  if(window.innerWidth>780) sidebar.classList.remove('open');
});

function logout() {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    }
</script>
</body>
</html>
