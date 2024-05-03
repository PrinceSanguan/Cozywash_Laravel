//Hamburger
function toggleMenu() {
    const menu = document.querySelector(".menu");
    if (menu.style.left === "-250px") {
        menu.style.left = "0";
    } else {
        menu.style.left = "-250px";
    }
}

//staff-list
// Dummy data for demonstration
const staffData = [
    {
        fullName: "John Doe",
        contact: "123-456-7890",
        address: "123 Main St",
        hireDate: "2024-04-27",
    },
    {
        fullName: "Jane Smith",
        contact: "456-789-0123",
        address: "456 Oak St",
        hireDate: "2024-04-28",
    },
];

// Function to render staff list
function renderStaffList() {
    const staffList = document.getElementById("staffList");
    staffList.innerHTML = "";
    staffData.forEach((staff) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${staff.fullName}</td>
            <td>${staff.contact}</td>
            <td>${staff.address}</td>
            <td>${staff.hireDate}</td>
        `;
        staffList.appendChild(row);
    });
}

// Add staff form submission event
document
    .getElementById("addStaffForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        const fullName = document.getElementById("fullName").value;
        const address = document.getElementById("address").value;
        const contact = document.getElementById("contact").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        // Dummy implementation: just log the data
        console.log(
            "Submitted Staff Data:",
            fullName,
            address,
            contact,
            email,
            password
        );
        // Clear the form fields
        document.getElementById("fullName").value = "";
        document.getElementById("address").value = "";
        document.getElementById("contact").value = "";
        document.getElementById("email").value = "";
        document.getElementById("password").value = "";
    });

// Initial render
renderStaffList();
