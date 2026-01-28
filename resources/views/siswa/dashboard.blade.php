<h1>Dashboard Siswa</h1>
<p>Login sebagai siswa berhasil</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
