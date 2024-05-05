//Hamburger
function toggleMenu() {
    const menu = document.querySelector(".menu");
    if (menu.style.left === "-250px") {
        menu.style.left = "0";
    } else {
        menu.style.left = "-250px";
    }
}

// Update dashboard stats
function updateDashboardStats() {
    const data = fetchDataForDashboard();
    document.getElementById("ongoing-services").textContent =
        data.ongoingServices;
    document.getElementById("completed-services").textContent =
        data.completedServices;
    document.getElementById("total-sales").textContent = data.totalSales;
    // Add more stats as needed
}

// Populate orders table
function populateOrdersTable() {
    const ordersBody = document.getElementById("orders-body");
    const data = fetchDataForDashboard();
    data.orders.forEach((order) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${order.orderNumber}</td>
            <td>${order.customerName}</td>
            <td>${order.serviceType}</td>
            <td>${order.kilos}</td>
            <td>${order.sales}</td>
            <td>${order.paymentStatus}</td>
            <td>${order.serviceStatus}</td>
        `;
        ordersBody.appendChild(row);
    });
}

// Call functions to update dashboard initially
updateDashboardStats();
populateOrdersTable();
