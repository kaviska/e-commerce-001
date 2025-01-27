// Function to toggle visibility and call corresponding function
const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
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
function showToast(message, bgColor = "bg-primary") {
  // Create toast container if not exists
  let toastContainer = document.getElementById("toastContainer");
  if (!toastContainer) {
      toastContainer = document.createElement("div");
      toastContainer.id = "toastContainer";
      toastContainer.className = "position-fixed top-0 end-0 p-3";
      toastContainer.style.zIndex = "1050"; // Ensure it's above other elements
      document.body.appendChild(toastContainer);
  }

  // Create Bootstrap toast element
  const toast = document.createElement("div");
  toast.className = `toast align-items-center text-white ${bgColor} border-0`;
  toast.setAttribute("role", "alert");
  toast.setAttribute("aria-live", "assertive");
  toast.setAttribute("aria-atomic", "true");

  // Toast inner content
  toast.innerHTML = `
      <div class="d-flex">
          <div class="toast-body">${message}</div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
  `;

  // Append toast to container
  toastContainer.appendChild(toast);

  // Initialize Bootstrap Toast
  const bootstrapToast = new bootstrap.Toast(toast);
  bootstrapToast.show();

  // Remove toast after shown duration
  toast.addEventListener("hidden.bs.toast", () => toast.remove());
}



function toggleSection(sectionToShow, functionToCall = null) {
  // Hide all sections
  const allSections = [
    document.getElementById("adminHomeContainer"),
    document.getElementById('viewProductContainer'),
    document.getElementById('addProductContainer'),
    document.getElementById('addSubCategoryContainer'),
    document.getElementById('viewSubCategoryContainer'),
    document.getElementById('activeOrdersContainer'),
    document.getElementById('historyOrdersContainer'),
    // profile,
    // packageLoadContainer,
    // packageAddContainer,
    // activeOrderLoadContainer,
    // historyOrderContainer,
    // adminHomeContainer,
    // todayOrderLoadContainer,
    // adminDetailsContainer,
    // packageEditContainer,
    // valetLoadContainer,
    // adminCancelOrderContainer,
    // userCancelOrderContainer,
  ];
  allSections.forEach((section) => section.classList.add("d-none"));

  // Show the selected section
  sectionToShow.classList.remove("d-none");

  // Call the corresponding function if provided
  if (functionToCall) {
    functionToCall();
  }
}

document.getElementById('viewProductBtn').addEventListener('click', () =>
  toggleSection(document.getElementById('viewProductContainer'))
)
document.getElementById('addProductBtn').addEventListener('click', () =>
  toggleSection(document.getElementById('addProductContainer'))
)
document.getElementById('viewSubCategoryBtn').addEventListener('click', () =>
  toggleSection(document.getElementById('viewSubCategoryContainer'))
)
document.getElementById('addSubCategoryBtn').addEventListener('click', () =>
  toggleSection(document.getElementById('addSubCategoryContainer'))
)
document.getElementById('activeOrderLoadBtn').addEventListener('click', () =>
  toggleSection(document.getElementById('activeOrdersContainer'))
)
document.getElementById('historyOrderBtn').addEventListener('click', () =>
  toggleSection(document.getElementById('historyOrdersContainer'))
)



function deleteProduct(id){
  sendRequest({
    method: "DELETE",
    url: `http://127.0.0.1:8000/api/products/delete`,
    data: { id },
    onSuccess: (result) => {
      console.log(result);
      showToast("Product deleted successfully");
      document.getElementById(`product-${id}`).remove();
    },
    onError: (error) => {
      console.error(error);
      showToast("Failed to delete product", "bg-red-500");
    }
  })
}
function addProduct(){
  let name = document.getElementById('prouctNameInput').value;
    let price = document.getElementById('productPriceInput').value;
    let description = document.getElementById('productDescriptionInput').value;
    let stock = document.getElementById('productStockInput').value;
    let subCategory = document.getElementById('productSubCategoryInput').value;
    let image = document.getElementById('productImageInput').files[0];

    let formData = new FormData();
    formData.append('name', name);
    formData.append('price', price);
    formData.append('description', description);
    formData.append('stock', stock);
    formData.append('sub_category_id', subCategory);
    formData.append('image', image);
  sendRequest({
    method: "POST",
    url: `http://127.0.0.1:8000/api/products`,
    data: formData,
    onSuccess: (result) => {
      console.log(result);
      showToast("Product added successfully");
    },
    onError: (error) => {
      console.error(error);
      showToast("Failed to add product", "bg-danger");
    }
  })
    


}
 
function addSubCategory(){
  let name = document.getElementById('subCategoryNameInput').value;
  let category = document.getElementById('categoryInput').value;
  sendRequest({
    method: "POST",
    url: `http://127.0.0.1:8000/api/subcategories`,
    data: { name, category_id: category },
    onSuccess: (result) => {
      console.log(result);
      showToast("Sub Category added successfully");
    },
    onError: (error) => {
      console.error(error);
      showToast("Failed to add sub category", "bg-danger");
    }
  })
}


function Deliverd(id){
  sendRequest({
    method: "POST",
    url: `http://127.0.0.1:8000/api/products/changeStatus`,
    data: { id, status: 'Delivered' },
    onSuccess: (result) => {
      console.log(result);
      showToast("Product status changed to Delivered");
      document.getElementById(`order-${id}`).remove();
    },
    onError: (error) => {
      console.error(error);
      showToast("Failed to change product status", "bg-red-500");
    }
  })
}