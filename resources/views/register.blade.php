{{-- cc/resources/views/register.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Computing 2025 Registration</title>
    
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="registration-container">
        <div class="header-section">
            <h1 class="form-title">Cloud Computing 2025</h1>
            <p class="form-subtitle">Enrollment Form</p>
        </div>

        <form id="regForm" action="{{ route('register.store') }}" method="POST">
            
            @csrf 

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName" placeholder="e.g., John Doe" value="{{ old('fullName') }}" required>
            </div>

            <div class="form-group">
                <label for="studentEmail">Student Email</label>
                <input type="email" id="studentEmail" name="studentEmail" placeholder="e.g., john.doe@example.com" value="{{ old('studentEmail') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a strong password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter your password" required>
            </div>

            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" required>
            </div>

            <button type="submit" class="submit-btn">Register Now</button>
        </form>
    </div>

</body>
</html>