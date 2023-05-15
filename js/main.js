const TB = 769;
const PC = 960;

const wp_dir = "/wp/";

new Vue({
  el: '#app',
  data: {
    scrollY: 0,
    isLoad: false,
    isDown: false,
    isMenu: false,
    isLeadEnd: false,
    isTopPage: false,
    isWorksPage: false,
    isWorksDtPage: false,
    isTb: false,
    isPC: false,
    isloading: true,
    isloadingLogo: false,
  },
  mounted() {

    setTimeout(() => {
      this.isloading = false;
    }, 1500);

    window.addEventListener('scroll', this.handleScroll);
    window.addEventListener('resize', this.handleResize);

    if (window.innerWidth >= PC) {
      this.isPC = true;
      this.isTb = false;
    } else if (window.innerWidth >= TB) {
      this.isPC = false;
      this.isTb = true;
    } else {
      this.isPC = false;
      this.isTb = false;
    }
    this.isLoad = true;

    if (location.pathname == '/wp/' || location.pathname == '/') {
      this.isTopPage = true;
      this.isloadingLogo = false;

      gsap
      .timeline({ repeat: 0, repeatDelay: 0.5 })
      .from(".p-kv__inner__title__line1", {
         x: 20,
         autoAlpha: 0,
         duration: .5, 
         delay: 2  
        })
      .from(".p-kv__inner__title__line2", {
        x: -20,
        autoAlpha: 0,
        duration: .5, 
        }, "<")
      .from(".p-kv__inner__title__char__inner", {      
        y: 100,
        duration: .8,
        ease: "power4.out",
        stagger: 0.1, // 0.02秒ごとに出現
      })
      .from(".p-kv__inner__photo__main", {
        delay: .6,
        duration: 1,
        autoAlpha: 0,      
        ease: "power2.out",
      })
      .from(".p-kv__inner__photo__sub", {
        duration: 1,
        autoAlpha: 0,
        ease: "power2.out",
      },"<")
      .from(".p-kv__inner__description__txt", {
        duration: 1,
        autoAlpha: 0,      
        ease: "power2.out",
      },"<")
      .from(".p-kv__inner__description__illust", {
        duration: 1,
        autoAlpha: 0,      
        ease: "power2.out",
      },"<")
      .from(".l-header-sp__inner,.p-header__logo,.p-nav,#contents", {
        autoAlpha: 0,
        duration: .7,
        ease: "power2.out",
      },"-=.5")
      .from(".g-mv-txt-point", {
        color: '#2C4680',
        duration: 1,
        ease: "power2.out",
      },"-=.5")
      
  
      gsap.from(".l-top-about", {
        scrollTrigger: ".l-top-about", // .boxがビューポート内に入った時にアニメーションが開始。
        opacity: 0,
        duration: .5
      });
  
      gsap.from(".l-top-kensa", {
        scrollTrigger: ".l-top-kensa", // .boxがビューポート内に入った時にアニメーションが開始。
        opacity: 0,
        duration: .5
      });


    } else {
      setTimeout(() => {
        this.isloading = false;
      }, 1000);
      this.isTop = false;
      this.isTopPage = false;
      let rootPath = '';
      console.log('location.pathname', location.pathname);
      if (location.pathname.indexOf(wp_dir) === 0) {
        rootPath = wp_dir;
      } else {
        rootPath = '/';
      }
      console.log('rootPath', rootPath);

      gsap
      .timeline({ repeat: 0, repeatDelay: 0.5 })
      .from(".c-head-title", {
         y: 20,
         autoAlpha: 0,
         duration: .5, 
         delay: 2
        })
      .from(".c-head-title__char__inner", {
        y: 100,
        duration: .8,
        ease: "power4.out",
        stagger: 0.03, // 0.02秒ごとに出現
      })
      .from(".p-header__logo,.p-nav", {
        autoAlpha: 0,
        duration: .7,
        ease: "power2.out",
      })
      .from(".c-contents", {
        autoAlpha: 0,
        duration: .7,
        y: 20,
        ease: "power2.out",
      },"<")











    }



    // gsap
    // .timeline({ repeat: -1, repeatDelay: 0.5 })
    // .from(".p-kv__inner__photo__main", {
    //   delay: 2,      
    //   duration: 2,
    //   scale: 100,
    //   autoAlpha: 0,      
    //   ease: "power4.out",
    // })


  },



  beforeDestroy() {
    window.removeEventListener('resize', this.handleResize);
  },
  methods: {
    clickMenu() {
      this.isMenu = !this.isMenu;
    },
    changeImg_button(p_url, p_no) {
    },
    leaveImg_button() {
    },
    handleScroll() {
      // トップから少しスクロールした時
      (window.scrollY > 30) ? this.isDown = true : this.isDown = false;
    },
    handleResize() {
      if (window.innerWidth >= PC) {
        this.isPC = true;
        this.isTb = false;
      } else if (window.innerWidth >= TB) {
        this.isPC = false;
        this.isTb = true;
      } else {
        this.isPC = false;
        this.isTb = false;
      }
    },
  }
})