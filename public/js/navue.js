export default {
  data() {
    return {
      HAS: false,
      HKC: true,
      HSR: false,
      user: "",
      userField: "",
      accountMenu: false,
      recentUsers: [],
    };
  },
  emits: ["login", "logout"],
  methods: {
    getUser() {
      this.user = localStorage.getItem("user");
      this.$emit("login", this.user);
    },
    logout() {
      localStorage.removeItem("user");
      this.user = "";
      this.$emit("logout", "");
    },
    setUser(id) {
      this.user = id ? id : this.userField;
      localStorage.setItem("user", this.user);
      this.$emit("login", this.user);
      this.addRecentUser(this.user);
    },
    addRecentUser(user) {
      if (this.recentUsers.indexOf(user) == -1) this.recentUsers.push(user);
      localStorage.setItem("recentUsers", JSON.stringify(this.recentUsers));
    },
    getRecentUsers() {
      const r = localStorage.getItem("recentUsers");
      if (r) this.recentUsers = JSON.parse(r);
    },
    deleteRecentUser(user) {
      this.recentUsers.splice(this.recentUsers.indexOf(user), 1);
      localStorage.setItem("recentUsers", JSON.stringify(this.recentUsers));
    },
    toggleAccountMenu() {
      this.accountMenu = !this.accountMenu;
    },
    isEnter(e) {
      if (e.key === "Enter" || e.keyCode === 13) {
        this.setUser();
      }
    },
  },
  mounted() {
    this.getUser();
    this.getRecentUsers();
  },
  computed: {
    avatar: {
      get() {
        return this.user
          ? "https://images.hive.blog/u/" + this.user + "/avatar"
          : "";
      },
    },
    loggedIn: {
      get() {
        return this.user ? true : false;
      },
    },
  },
  template: `
<header class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:rgba(42, 48, 54, 0.8); -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);">
  <div class="container-fluid">
	<a class="navbar-brand" href="/"><img src="/img/dlux-hive-logo-alpha.svg" alt="dlux-logo" width="40" height="40"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a class="nav-link" href="/apps/">APPS</a></li>
        <li class="nav-item"> <a class="nav-link" href="/nfts/">NFTS</a></li>
        <li class="nav-item"> <a class="nav-link" href="/dex#dlux">DEX</a></li>
        <li class="nav-item"> <a class="nav-link" href="/docs/">DOCS</a></li>
      </ul>
	<ul class="navbar-nav mr-5" id="loginMenu" v-show="!loggedIn">
	<li class="nav-item"><a class="nav-link acct-link" href="/about/">About</a></li>
	<li class="nav-item"><a class="nav-link acct-link" href="https://signup.hive.io/">Get Account</a></li>
	<li class="nav-item"><input id="userLogin" v-model="userField" placeholder="username" @blur="setUser()" @keyup.enter="setUser()" class="bg-darkg border-dark text-info"></li>
    <li class="nav-item"><button class="btn btn-submit" @click="setUser()">Login</button></li>
    <li class="nav-item"><button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" @click="toggleAccountMenu()" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
  <i class="fal fa-address-book"></i>
</button></li>
	</ul>
    <div class="mr-5" v-show="loggedIn" id="userMenu">
	  <ul class="nav navbar-nav">
		<li class="nav-item my-auto">
			<a class="nav-link" href="/new/" data-bs-toggle="tooltip"  title="Create a new app">
				<i class="fas fa-fw fa-lg fa-plus me-2"></i></a></li>
		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle text-white-50" id="userDropdown" role="button" aria-expanded="false" data-bs-toggle="dropdown" href="#">
			  <img :src="avatar" id="userImage" alt="" width="30" height="30" class="img-fluid rounded-circle bg-light mr-1 cover">
			  <span id="userName">{{user}}</span></a>
          <ul class="dropdown-menu dropdown-menu-dark pt-0" aria-labelledby="userDropdown">
			 <li><a class="dropdown-item" href="/me#blog/" onClick="showTab('blog')"><i class="fas fa-user fa-fw me-2"></i>Profile</a></li>
			 <li><a class="dropdown-item" href="/me#wallet/" onClick="showTab('wallet')"><i class="fas fa-wallet fa-fw me-2"></i>Wallet</a></li>
			 <li><a class="dropdown-item" href="/me#inventory/" onClick="showTab('inventory')"><i class="fas fa-boxes fa-fw me-2"></i>Inventory</a></li>
			 <li><a class="dropdown-item" href="/me#node/" onClick="showTab('node')"><i class="fas fa-robot fa-fw me-2"></i>Node</a></li>
			 <li><a class="dropdown-item" href="/me#settings/" onClick="showTab('settings')"><i class="fas fa-cog fa-fw me-2"></i>Settings</a></li>
             <li><hr class="dropdown-divider"></li>
			 <li><a class="dropdown-item" href="/about/"><i class="fas fa-info-circle fa-fw me-2"></i>About</a></li>
             <li><hr class="dropdown-divider"></li>
             <li><a class="dropdown-item" href="#" @click="logout()"><i class="fas fa-user-friends me-2"></i>Switch User</a></li>
			 <li><a class="dropdown-item" href="#" @click="logout()"><i class="fas fa-power-off fa-fw me-2"></i>Logout</a></li>
		</ul>
        </li>
      </ul>
	</div>
    </div>
    </div>
    <div v-show="accountMenu" class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Your Accounts</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" @click="toggleAccountMenu()"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Stored locally, these are the accounts you've logged in with.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
        Dropdown button
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li v-for="name in recentUsers">
            <a class="dropdown-item" href="#" role="button" @click="setUser(name)">@{{name}}</a> | 
            <a class="dropdown-item" href="#/" role="button" @click="deleteRecentUser(name)">X</a>
        </li>
      </ul>
    </div>
  </div>
</div>
</header>`,
};