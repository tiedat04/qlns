<form action="{{ route('nhanviens.destroy', $nhanvien->MaNhanVien) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Xóa Nhân Viên</button>
</form>
