<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  <div>
    {{-- add boostrap cdn --}}
    {{-- The Master doesn't talk, he acts. --}}
    <section class="alg-text-p mx-5">
        <div class="container-fluid h-custom mt-5">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
              <form>
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                  
      
                 
      
                 
                </div>
      
               
      
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" id="email" class="form-control form-control-lg alg-text-p"
                    placeholder="Enter a valid email address" />
                  
                </div>
      
                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-3">
                  <input type="password" id="password" class="form-control form-control-lg alg-text-p"
                    placeholder="Enter password" />
                
                </div>
      
                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                      Remember me
                    </label>
                  </div>
                </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="button" onclick="login()" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary px-4 alg-text-p"
                  >Login</button>
               
                </div>
      
              </form>
            </div>
          </div>
        </div>
       
      </section>
      
      
      
      

   
      
</div>
<script>
  async function sendRequest({ method, url, data = {}, onSuccess, onError }) {
    try {
        let auth = localStorage.getItem("user") || null;

        // Check if the request method is GET or HEAD (no body allowed)
        const isGetOrHead = method === "GET" || method === "HEAD";

        let requestOptions = {
            method,
            headers: {
                'Accept': 'application/json',
                ...(auth && { 'Authorization': `Bearer ${auth}` })
            }
        };

        if (!isGetOrHead) {
            // Use FormData if sending files, otherwise JSON
            if (data instanceof FormData) {
                requestOptions.body = data;
            } else {
                requestOptions.body = JSON.stringify(data);
                requestOptions.headers["Content-Type"] = "application/json";
            }
        }

        console.log("Sending request:", requestOptions);

        const response = await fetch(url, requestOptions);

        let result;
        try {
            result = await response.json(); // Attempt to parse JSON
        } catch (e) {
            result = { message: "Invalid JSON response" };
        }

        if (response.ok) {
            console.log("Request successful:", result);
            onSuccess(result);
        } else {
            console.error("Request failed:", result);
            onError(result);

        }
    } catch (error) {
        console.error("Network error:", error);
        showToast("Network error. Please try again.", "bg-red-500");
    }
}


// Function to show toast messages using TailwindCSS
function showToast(message, bgColor) {
    const toast = document.createElement("div");
    toast.className = `fixed top-5 right-5 px-4 py-2 text-white rounded shadow-lg ${bgColor}`;
    toast.textContent = message;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}
  function login() {
    console.log("Loging user...");
    event.preventDefault();

    const data = {

        email: document.getElementById("email").value,
        password: document.getElementById("password").value,

    };

    console.log("Data:", data);

    sendRequest({
        method: "POST",
        url: "http://127.0.0.1:8000/api/users/login", // Replace with actual endpoint
        data: data,
        onSuccess: (response) => {
            showToast(response.message, "bg-green-500");
            localStorage.setItem("user", response.results)
         //redirect to the dashboard
          window.location.href = "/admin";
        },
        onError: (error) => {
            console.error("Registration failed", error);
            showToast(result.message || "An error occurred", "bg-red-500");
        }
    });
}
  </script>
</body>
</html>