<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
</head>
<body>
<div class="container mt-5">
    <h2>Student Information</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Email</th>
            <th>State</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->course_id }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->state }}</td>
                <td>
                    <form action="{{ route('students.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <select name="state" class="form-control">
                            <option value="pending" {{ $student->state == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="enrolled" {{ $student->state == 'enrolled' ? 'selected' : '' }}>Enrolled</option>
                            <option value="completed" {{ $student->state == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>



