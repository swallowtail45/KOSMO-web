<form method="POST" action="{{ route('register2') }}">
    @csrf

    <input type="text" name="provinsi" placeholder="Provinsi" class="border" required>
    <input type="text" name="kota" placeholder="Kota/Kab" class="border" required>
    <input type="text" name="kecamatan" placeholder="Kecamatan" class="border" required>
    <input type="text" name="kelurahan" placeholder="Kelurahan" class="border" required>

    <button type="submit">Daftar</button>
</form>
