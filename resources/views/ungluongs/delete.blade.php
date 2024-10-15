<form action="{{ route('ungluongs.destroy', $nhanvien->MaNhanVien) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Xóa Ứng Lương</button>
</form>
