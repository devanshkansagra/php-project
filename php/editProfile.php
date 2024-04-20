<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Google Fonts - Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">

  <style>
    /* Colors for light mode */
    :root {
      --background-color: #f8f9fa;
      --text-color: #333;
      --secondary-text-color: #666;
      --btn-background-color: #007bff;
      --btn-border-color: #007bff;
      --accent-color: #6c757d; /* Accent color for additional styling */
    }

    /* Colors for dark mode */
    body.dark-mode {
      --background-color: rgb(59, 59, 56);
      --text-color: #fff;
      --secondary-text-color: #ccc;
      --btn-background-color: #007bff; /* Keep the Save Changes button blue */
      --btn-border-color: #007bff; /* Keep the border color blue */
      --accent-color: #adb5bd; /* Accent color for additional styling */
    }

    /* Base styles */
    body {
      background-color: var(--background-color);
      color: var(--text-color);
      font-family: 'Poppins', sans-serif; /* Apply Google Font */
      transition: background-color 0.3s, color 0.3s;
      position: relative;
      line-height: 1.6; /* Improved readability */
    }

    /* Utility classes */
    .text-muted {
      color: var(--accent-color);
    }

    .profile-card1 {
      position: relative;
      top: 60px;
      left: 430px;
      max-width: 225px;
      height: 225px;
      padding: 30px;
      background-color: #333; /* Updated for dark mode */
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1); /* Updated for dark mode */
    }

    /* Profile card styles */
    .profile-card2 {
      max-width: 700px;
      margin: 50px auto;
      margin-top: 30px;
      background-color: #333; /* Updated for dark mode */
      padding: 20px;
      padding-top: 50px;
      border-radius: 8px;
    }

    .profile-img {
      position: relative;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1); /* Updated for dark mode */
      margin: 0 auto;
    }

    .profile-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .upload-icon {
      position: absolute;
      bottom: 0;
      right: 0;
      transform: translate(50%, 50%);
      background-color: rgba(0, 0, 0, 0.8); /* Updated for dark mode */
      padding: 5px;
      border-radius: 50%;
    }

    .upload-icon i {
      color: #fff; /* Updated for dark mode */
    }

    .profile-info {
      text-align: center;
    }

    h3 {
      margin-bottom: 10px;
      color: var(--text-color);
      font-weight: normal;
    }

    p {
      margin-bottom: 15px;
      color: var(--secondary-text-color);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      font-size: large;
    }

    table td {
      padding: 8px;
    }

    .btn-primary {
      background-color: var(--btn-background-color);
      border-color: var(--btn-border-color);
    }

    .btn-primary:hover {
      background-color: var(--btn-background-color);
      border-color: var(--btn-border-color);
    }

    .dark-mode-toggle {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }

    .form-group {
      position: relative;
      margin-bottom: 1rem;
    }

    .form-group label {
      position: absolute;
      top: 0;
      left: 0;
      margin: 0.5rem;
      transition: all 0.3s;
      color: var(--accent-color);
    }

    .form-group input {
      width: 100%;
      padding: 1rem;
      font-size: 1rem;
      border-radius: 5px;
      border: 1px solid var(--accent-color);
      background-color: #444; /* Updated for dark mode */
      color: #fff; /* Updated for dark mode */
    }

    .form-group input:focus + label,
    .form-group input:not(:placeholder-shown) + label {
      top: -1rem;
      left: 0.5rem;
      font-size: 0.75rem; /* Adjust font size as needed */
    }
  </style>
</head>
<body class="dark-mode"> <!-- Added dark-mode class to body -->
<div class="container">
  <div class="profile-card1">
    <div class="profile-img">
      <img src="profile-pic.png" alt="Profile Picture">
      <div class="upload-icon">
        <i class="fas fa-upload"></i>
      </div>
    </div>
  </div>
  <div class="profile-card2">
    <div class="profile-info">
      <form>
        <div class="form-group">
          <input type="text" id="name" name="name" placeholder=" ">
          <label for="name">Name</label>
        </div>
        <div class="form-group">
          <input type="email" id="email" name="email" placeholder=" ">
          <label for="email">Email</label>
        </div>
        <div class="form-group">
          <input type="text" id="dob" name="dob" placeholder=" ">
          <label for="dob">Date of Birth</label>
        </div>
        <div class="form-group">
          <input type="text" id="mobile" name="mobile" placeholder=" ">
          <label for="mobile">Mobile Number</label>
        </div>
        <div class="form-group">
          <input type="text" id="subscription" name="subscription" placeholder=" ">
          <label for="subscription">Renew Subscription</label>
        </div>
        <a href="./profile.php"><button class="btn btn-primary">Save Changes</button></a>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
