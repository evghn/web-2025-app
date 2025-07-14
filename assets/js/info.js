const getCountPosts = async () => {
    try {
        const response = await fetch("/info/getCountPosts", {
            method: "POST"
        });
        const data = await response.json();
        if (data.status) {
            const elCount = document.querySelector(".count-posts");
            elCount.innerText = data.count
        }
    } catch (error) {
        
    }
};

const getCountUsers = async () => {
    try {
        const response = await fetch("/info/getCountUsers", {
            method: "POST"
        });
        const data = await response.json();
        if (data.status) {
            const elCount = document.querySelector(".count-users");
            elCount.innerText = data.count
        }
    } catch (error) {
        
    }
};


setTimeout(function getInfo() {
    getCountPosts();
    getCountUsers();
    setTimeout(getInfo, 5000);
}, 5000)