// Reusable function to send requests
document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM loaded");
});

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

// Handle registration process

function register() {
    console.log("Registering user...");
    event.preventDefault();

    const data = {
        first_name: document.getElementById("first_name").value,
        last_name: document.getElementById("last_name").value,
        email: document.getElementById("email").value,
        password: document.getElementById("password").value,
        phone: document.getElementById("mobile").value
    };

    sendRequest({
        method: "POST",
        url: "http://127.0.0.1:8000/api/users/register", // Replace with actual endpoint
        data: data,
        onSuccess: (response) => {
            showToast(response.message, "bg-green-500");
            localStorage.setItem("user", response.results)
            //refresh page
            location.reload();

        },
        onError: (error) => {
            console.error("Registration failed", error);
            showToast(result.message || "An error occurred", "bg-red-500");
        }
    });

}

function login() {
    console.log("Loging user...");
    event.preventDefault();

    const data = {

        email: document.getElementById("email").value,
        password: document.getElementById("password").value,

    };

    sendRequest({
        method: "POST",
        url: "http://127.0.0.1:8000/api/users/login", // Replace with actual endpoint
        data: data,
        onSuccess: (response) => {
            showToast(response.message, "bg-green-500");
            localStorage.setItem("user", response.results)
            //refresh page
            location.reload();

        },
        onError: (error) => {
            console.error("Registration failed", error);
            showToast(result.message || "An error occurred", "bg-red-500");
        }
    });
}

function loadCart() {
    sendRequest({
        method: "GET",
        url: "http://127.0.0.1:8000/api/carts", // Replace with actual endpoint
        onSuccess: (response) => {
            showToast(response.message, "bg-green-500");
            let cart = response.results;
            let itemCount;
            let total;



            cart.forEach(item => {
                if (document.getElementById('cartContainer')) {
                    itemCount += item.quantity;
                    total += item.product.price * item.quantity;
                    document.getElementById('cartContainer').innerHTML += `
                  
                        <div
                        class="flex flex-row min-[500px]:flex-row min-[500px]:items-center gap-5 py-6  border-b border-gray-200 group">
                        <div class="w-full md:max-w-[126px]">
                            <img src="/assets/images/${item.product.image}" alt="perfume bottle image"
                                class="mx-auto rounded-xl object-cover">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 w-full">
                            <div class="md:col-span-2">
                                <div class="flex flex-col max-[500px]:items-center gap-3">
                                    <h6 class="font-semibold text-base leading-7 text-black">${item.product.name}</h6>
                                    <h6 class="font-normal text-base leading-7 text-gray-500">${item.product.sub_category.name}</h6>
                                    <h6
                                        class="font-medium text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-indigo-600">
                                        ${item.product.price} LKR</h6>
                                </div>
                            </div>
                            <div class="flex items-center max-[500px]:justify-center h-full max-md:mt-3">
                                <div class="flex items-center h-full">
                                    <button
                                        class="group rounded-l-xl px-5 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-gray-50 hover:border-gray-300 hover:shadow-gray-300 focus-within:outline-gray-300">
                                        <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black"
                                            xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 22 22" fill="none">
                                            <path d="M16.5 11H5.5" stroke="" stroke-width="1.6"
                                                stroke-linecap="round" />
                                            <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2"
                                                stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2"
                                                stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                    <input type="text"
                                        class="border-y border-gray-200 outline-none text-gray-900 font-semibold text-lg w-full max-w-[73px] min-w-[60px] placeholder:text-gray-900 py-[15px]  text-center bg-transparent"
                                        placeholder="${item.quantity}">
                                    <button
                                        class="group rounded-r-xl px-5 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-gray-50 hover:border-gray-300 hover:shadow-gray-300 focus-within:outline-gray-300">
                                        <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black"
                                            xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 22 22" fill="none">
                                            <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-width="1.6"
                                                stroke-linecap="round" />
                                            <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2"
                                                stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2"
                                                stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center max-[500px]:justify-center md:justify-end max-md:mt-3 h-full">
                                <p
                                    class="font-bold text-lg leading-8 text-gray-600 text-center transition-all duration-300 group-hover:text-indigo-600">
                                    ${item.product.price * item.quantity} LKR</p>
                            </div>
                        </div>
                    </div>

                   
`



                }
            });


        },
        onError: (error) => {
            console.error("Registration failed", error);
        }
    })
}

document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM loaded");
    loadCart()

});





document.addEventListener("DOMContentLoaded", function () {
    const loginLink = document.getElementById('login-link');
    const logoutLink = document.getElementById('logout-link');

    // Check if the user is logged in
    const user = localStorage.getItem('user');
    if (user) {
        loginLink.classList.add('hidden');
        logoutLink.classList.remove('hidden');
    } else {
        loginLink.classList.remove('hidden');
        logoutLink.classList.add('hidden');
    }

    // Handle logout
    logoutLink.addEventListener('click', function (event) {
        event.preventDefault();
        localStorage.removeItem('user');
        showToast("Logged out successfully", "bg-green-500");
        loginLink.classList.remove('hidden');
        logoutLink.classList.add('hidden');
    });

    // Function to update cart count
    async function updateCartCount() {
        try {
            const response = await fetch("http://127.0.0.1:8000/api/carts", {
                method: "GET",
                headers: {
                    'Accept': 'application/json',
                    ...(user && { 'Authorization': `Bearer ${user}` })
                }
            });

            if (!response.ok) {
                throw new Error("Failed to fetch cart data");
            }

            const result = await response.json();
            const cartItems = result.results || [];
            const cartCount = cartItems.reduce((total, item) => item.quantity, 0);
            const cartCountElement = document.getElementById("cartCount");

            cartCountElement.textContent = cartCount;
        } catch (error) {
            console.error("Error updating cart count:", error);
        }
    }

    // Update cart count on page load
    updateCartCount();
});

async function addToCart(productId) {
    console.log("Adding product to cart:", productId);
    const user = localStorage.getItem('user');
    if (!user) {
        showToast("Please log in to add items to the cart", "bg-red-500");
        return;
    }

    const data = {
        product_id: productId,
        quantity: document.getElementById('quantity').value // Default quantity to add
    };

    sendRequest({
        method: "POST",
        url: "http://127.0.0.1:8000/api/carts", // Replace with actual endpoint
        data: data,
        onSuccess: (response) => {
            showToast("Product added to cart successfully", "bg-green-500");

        },
        onError: (error) => {
            console.error("Failed to add product to cart", error);
            showToast("Failed to add product to cart", "bg-red-500");
        }
    });
}

// Function to show toast messages using TailwindCSS
function showToast(message, bgColor) {
    const toast = document.createElement("div");
    toast.className = `fixed top-5 right-5 px-4 py-2 text-white rounded shadow-lg ${bgColor}`;
    toast.textContent = message;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById('search');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.trim();
        if (query.length > 0) {
            searchProducts(query);
        } else {
            // Clear search results if the query is empty
            clearSearchResults();
        }
    });
});

async function searchProducts(query) {
    sendRequest({
        method: "GET",
        url: `http://127.0.0.1:8000/api/products?search=${query}`, // Replace with actual endpoint
        onSuccess: (response) => {
            displaySearchResults(response.results);
        },
        onError: (error) => {
            console.error("Search failed", error);
            showToast("Search failed", "bg-red-500");
        }
    });
}

function displaySearchResults(products) {
    console.log("Search results:", products);
    const searchResultsContainer = document.getElementById('searchResults');
    searchResultsContainer.innerHTML = ''; // Clear previous results

    if (products.length === 0) {
        searchResultsContainer.classList.add('hidden'); // Hide if no results
        return;
    }

    products.forEach(product => {
        const productElement = document.createElement('div');
        productElement.className = 'search-result-item border-b border-gray-200 last:border-none';
        productElement.innerHTML = `
            <a href="/product/${product.id}" class="flex items-center p-3 hover:bg-gray-100 transition">
                <img src="/assets/images/${product.image}" alt="${product.name}" class="h-10 w-10 rounded-full object-cover">
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">${product.name}</p>
                    <p class="text-sm text-gray-500">${product.price} LKR</p>
                </div>
            </a>
        `;
        searchResultsContainer.appendChild(productElement);
    });

    // Show results when available
    searchResultsContainer.classList.remove('hidden');
}

function clearSearchResults() {
    const searchResultsContainer = document.getElementById('searchResults');
    searchResultsContainer.innerHTML = ''; // Clear search results
}

