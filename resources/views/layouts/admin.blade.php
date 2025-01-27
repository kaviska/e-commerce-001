



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar With Bootstrap</title>
  <script src="{{ asset('assets/js/admin.js') }}" defer></script>
  @livewireStyles


  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script defer src="../../js/main.js"></script>
  <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
{{-- add boostrap icon --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
 
</head>
<style>
  a {
    text-decoration: none;
  }

  li {
    list-style: none;
  }

  body {
    font-family: 'Poppins', sans-serif;
  }

  .wrapper {
    display: flex;
  }

  table {
    font-size: 13px;
  }

  .main {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    width: 100%;
    overflow: hidden;
    transition: all 0.35s ease-in-out;
    background-color: #fff;
    min-width: 0;
  }

  #sidebar {
    width: 70px;
    min-width: 70px;
    z-index: 1000;
    transition: all .25s ease-in-out;
    background-color: #0e2238;
    display: flex;
    flex-direction: column;
  }

  #sidebar.expand {
    width: 260px;
    min-width: 260px;
  }

  .toggle-btn {
    background-color: transparent;
    cursor: pointer;
    border: 0;
    padding: 1rem 1.5rem;
  }

  .toggle-btn i {
    font-size: 1.5rem;
    color: #FFF;
  }

  .sidebar-logo {
    margin: auto 0;
  }

  .sidebar-logo a {
    color: #FFF;
    font-size: 1.15rem;
    font-weight: 600;
  }



  #sidebar:not(.expand) .sidebar-logo,
  #sidebar:not(.expand) a.sidebar-link span {
    display: none;
  }

  #sidebar.expand .sidebar-logo,
  #sidebar.expand a.sidebar-link span {
    animation: fadeIn .25s ease;
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }

  .sidebar-nav {
    padding: 2rem 0;
    flex: 1 1 auto;
  }

  a.sidebar-link {
    padding: .625rem 1.625rem;
    color: #FFF;
    display: block;
    font-size: 0.9rem;
    white-space: nowrap;
    border-left: 3px solid transparent;
  }

  .sidebar-link i,
  .dropdown-item i {
    font-size: 1.1rem;
    margin-right: .75rem;
  }

  a.sidebar-link:hover {
    background-color: rgba(255, 255, 255, .075);
    border-left: 3px solid #3b7ddd;
  }

  .sidebar-item {
    position: relative;
  }

  #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
    position: absolute;
    top: 0;
    left: 70px;
    background-color: #0e2238;
    padding: 0;
    min-width: 15rem;
    display: none;
  }

  #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
    display: block;
    max-height: 15em;
    width: 100%;
    opacity: 1;
  }

  #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
    border: solid;
    border-width: 0 .075rem .075rem 0;
    content: "";
    display: inline-block;
    padding: 2px;
    position: absolute;
    right: 1.5rem;
    top: 1.4rem;
    transform: rotate(-135deg);
    transition: all .2s ease-out;
  }

  #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
    transform: rotate(45deg);
    transition: all .2s ease-out;
  }

  .navbar {
    background-color: #f5f5f5;
    box-shadow: 0 0 2rem 0 rgba(33, 37, 41, .1);
    max-height: 80px;
  }

  .navbar-expand .navbar-collapse {
    min-width: 200px;
  }

  .avatar {

    width: 130px;
    height: 80px;
  }

  .middleNumber {
    font-size: 50px;
  }

  .genarate-submit {
    background-color: #0930DE;
    border-radius: 5px;
    width: 300px;
  }

  #arrowIcon {
    cursor: pointer;
  }


  @media (min-width: 768px) {}
</style>
<body>
{{$slot}}
@livewireScripts
</body>
</html>