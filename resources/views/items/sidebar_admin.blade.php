<!-- LEFT SIDEBAR menu samping -->
<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li><a href="{{ route('adminhome') }}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
				</li>
				<li>
					<a href="#subPages" data-toggle="collapsed" class="collapsed"><i class="lnr lnr-menu"></i> <span>Menu</span>
					<i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="subPages" class="collapsed">
							<ul class="nav">
								<li><a href="{{ route('dataMatpel') }}"><i class="lnr lnr-bookmark"></i> <span>Mata Pelajaran</span></a></li>
								<li><a href="{{ route('datatahun_ajaran') }}"><i class="lnr lnr-bookmark"></i> <span>Tahun Pelajaran</span></a></li>
								<li><a href="{{ route('dataMatpel') }}"><i class="lnr lnr-bookmark"></i> <span>Data Guru</span></a></li>
								<li><a href="{{ route('dataMatpel') }}"><i class="lnr lnr-bookmark"></i> <span>Data Siswa</span></a></li>
								<li><a href="{{ route('dataMatpel') }}"><i class="lnr lnr-bookmark"></i> <span>Profil Sekolah</span></a></li>
							</ul>
						</div>
				</li>

			</ul>
		</nav>
	</div>
</div>
<!-- END LEFT SIDEBAR -->