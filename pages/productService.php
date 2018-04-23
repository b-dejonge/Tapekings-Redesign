<?php include 'inc/head.php';
require_once 'app/database.php'; ?>

<body class="product-page">
  <?php include 'inc/nav.php'; ?>

  <?php
  $product = $_SESSION['product'];

  if ($product=="basic") {
    $price = "10.00";
  }else if ($product=="standard") {
    $price = "20.00";
  }else if ($product=="hydro") {
    $price = "30.00";
  }else if ($product=="custom") {
    $price = "40.00";
  }
  ?>

  <div class="container">
    <div class="row product-all">
      <div class="col-lg-5 product-image">
        <img id="product-image" src="css/img/products/designs/viper-thread.jpg">
      </div>
      <div class="col-lg-7 product-details">
        <h1>Send Us Your Bat</h1>
        <p id="product-price" class="product-price">$<?php echo $price; ?></p>
        <hr>
          <form method="POST" action="inc/cartadd.php">
        <div class="container">
            <div id="app">
                <step-navigation :steps="steps" :currentstep="currentstep">
                </step-navigation>

                <div class="step-content">
                <div v-show="currentstep == 1" class="row">
                    <div class="form-group col-md-6">
                      <label for="product">Grip Type:</label>
                      <select id="product-select" class="custom-select" name="product" onchange="changeInfo()" value="Standard">
                        <option <?php if ($product=="basic") { echo "selected ";} ?>value="basic">Basic</option>
                        <option <?php if ($product=="standard") { echo "selected ";} ?> value="standard">Standard</option>
                        <option <?php if ($product=="hydro") { echo "selected ";} ?>value="hydro">Hydro</option>
                        <option <?php if ($product=="custom") { echo "selected ";} ?>value="custom">Custom</option>
                      </select>
                    </div>
                    <div class="col-md-6 text-left">
                      <ul>
                        <li id="design-type">Only Standard Designs</li>
                        <li id="grip-type">Standard Grip</li>
                        <li id="shipping-type">You pay for shipping</li>
                      </ul>
                    </div>
                </div>

                <div v-show="currentstep == 2">
                    <div class="form-group">
                      <label for="design">Design:</label>
                      <select id="design-select" class="custom-select" name="design" onchange="changeImage()">
                        <option value="viper-thread">Viper Thread</option>
                        <option value="true-original">True Original</option>
                        <option value="brick-yard">Brick Yard</option>
                        <option value="american-flag">American Flag</option>
                        <option value="freestyle">Freestyle</option>
                      </select>
                      <textarea id="custom-design" name="custom-design" rows="5" cols="70" placeholder="Talk about what you want your design to look like. Email us with a photo first to be sure"></textarea>
                    </div>
                </div>

                <div id="color-pick" v-show="currentstep == 3">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="color1">Color 1:</label>
                        <select id="color1" class="custom-select" name="color1" required>
                          <option value="">Choose...</option>
                          <option value="white">White</option>
                          <option value="black">Black</option>
                          <option value="red">Red</option>
                          <option value="yelow">Yellow</option>
                          <option value="orange">Orange</option>
                          <option value="pink">Pink</option>
                          <option value="navy-blue">Navy Blue</option>
                          <option value="royal-blue">Royal Blue</option>
                          <option value="sky-blue">Sky Blue</option>
                          <option value="purple">Purple</option>
                          <option value="neon-green">Neon Green</option>
                          <option value="teal">Teal</option>
                          <option value="green">Green</option>
                          <option value="maroon">Maroon</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="color2">Color 2:</label>
                        <select id="color2" class="custom-select" name="color2" required>
                          <option value="">Choose...</option>
                          <option value="white">White</option>
                          <option value="black">Black</option>
                          <option value="red">Red</option>
                          <option value="yelow">Yellow</option>
                          <option value="orange">Orange</option>
                          <option value="pink">Pink</option>
                          <option value="navy-blue">Navy Blue</option>
                          <option value="royal-blue">Royal Blue</option>
                          <option value="sky-blue">Sky Blue</option>
                          <option value="purple">Purple</option>
                          <option value="neon-green">Neon Green</option>
                          <option value="teal">Teal</option>
                          <option value="green">Green</option>
                          <option value="maroon">Maroon</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="color3">Color 3:</label>
                        <select id="color3" class="custom-select" name="color3" required>
                          <option value="">Choose...</option>
                          <option value="white">White</option>
                          <option value="black">Black</option>
                          <option value="red">Red</option>
                          <option value="yelow">Yellow</option>
                          <option value="orange">Orange</option>
                          <option value="pink">Pink</option>
                          <option value="navy-blue">Navy Blue</option>
                          <option value="royal-blue">Royal Blue</option>
                          <option value="sky-blue">Sky Blue</option>
                          <option value="purple">Purple</option>
                          <option value="neon-green">Neon Green</option>
                          <option value="teal">Teal</option>
                          <option value="green">Green</option>
                          <option value="maroon">Maroon</option>
                        </select>
                      </div>
                    </div>
                </div>

                <div v-show="currentstep == 4">
                    <div class="form-group row">
                        <div class="col-md-4">
                          <strong>Grip Type:</strong>
                          <p id="review-grip"></p>
                          <input type="hidden" id="review-grip-input" name="grip-type" value="">
                        </div>
                        <div class="col-md-4">
                          <strong>Design:</strong>
                          <p id="review-design"></p>
                          <input type="hidden" id="review-design-input" name="design-type" value="">
                        </div>
                        <div class="col-md-4">
                          <strong>Colors:</strong>
                          <p id="review-colors"></p>
                          <input type="hidden" id="review-color1-input" name="color1" value="">
                          <input type="hidden" id="review-color2-input" name="color2" value="">
                          <input type="hidden" id="review-color3-input" name="color3" value="">
                        </div>
                    </div>
                </div>

                <step v-for="step in steps" :currentstep="currentstep" :key="step.id" :step="step" :stepcount="steps.length" @step-change="stepChanged">
                </step>

                <script type="x-template" id="step-navigation-template">
                    <ol class="step-indicator">
                        <li v-for="step in steps" is="step-navigation-step" :key="step.id" :step="step" :currentstep="currentstep">
                        </li>
                    </ol>
                </script>

                <script type="x-template" id="step-navigation-step-template">
                    <li :class="indicatorclass">
                        <div class="step"><i :class="step.icon_class"></i></div>
                        <div class="caption hidden-xs hidden-sm">Step <span v-text="step.id"></span>: <span v-text="step.title"></span></div>
                    </li>
                </script>

                <script type="x-template" id="step-template">
                    <div class="step-wrapper" :class="stepWrapperClass">
                        <button type="button" class="btn btn-primary back-button" @click="lastStep" :disabled="firststep">
                            Back
                        </button>
                        <button type="button" class="btn btn-primary next-button" onclick="review()" @click="nextStep" :disabled="laststep">
                            Next
                        </button>
                        <button type="submit" class="btn btn-primary" name="send-us-your-bat-submit" v-if="laststep">
                            Add to Cart
                        </button>
                    </div>
                </script>
            </div>
          </div>
        </div>
        </form>
        </div>
        <script type="text/javascript">

          function review() {
            var product = $('#product-select').val();
            $("#review-grip").html(product);
            $("#review-grip-input").attr("value",product);

            if (product!="custom") {
              var design = $("#design-select").val();
              $("#review-design-input").attr("value",design);
              design = design.replace("-"," ");
              $("#review-design").html(design);
            } else {
              var design = $("#custom-design").val();
              $("#review-design-input").attr("value","custom");
              $("#review-design").html(design);
            }

            var color1 = $("#color1").val();
            $("#review-color1-input").attr("value",color1);
            color1 = color1.replace("-"," ");
            var color2 = $("#color2").val();
            $("#review-color2-input").attr("value",color2);
            color2 = color2.replace("-"," ");
            var color3 = $("#color3").val();
            $("#review-color3-input").attr("value",color3);
            color3 = color3.replace("-"," ");

            if (color1==""||color2==""||color3=="") {
              var allColors = "Please select 3 valid colors";
              $("#review-colors").css("color","red");
              $("#review-colors").html(allColors);
            } else {
              var allColors = color1 + ", " + color2 + ", " + color3;
              $("#review-colors").css("color","inherit");
              $("#review-colors").html(allColors);
            }
          }

          function changeInfo() {
            var option = $('#product-select').val();
            if (option=="basic") {
              $("#product-price").html("$10.00");
              $("#custom-design").hide();
              $("#design-select").show();

              $("#design-select option[value='viper-thread']").remove();
              $("#design-select option[value='true-original']").remove();
              $("#design-select option[value='brick-yard']").remove();
              $("#design-select option[value='american-flag']").remove();
              $("#design-select option[value='freestyle']").remove();
              $("#design-select option[value='vortex-illusion']").remove();
              $("#design-select option[value='shadow-x']").remove();
              $("#design-select option[value='rainbow-trout-series']").remove();
              $("#design-select option[value='weaver-series']").remove();
              $("#design-select option[value='quad-hex']").remove();
              $("#design-select option[value='split-tribe']").remove();
              $("#design-select option[value='breast-cancer']").remove();

              $("#design-select").append('<option value="viper-thread">Viper Thread</option>');
              $("#design-select").append('<option value="true-original">True Original</option>');
              $("#design-select").append('<option value="brick-yard">Brick Yard</option>');
              $("#design-select").append('<option value="american-flag">American Flag</option>');
              $("#design-select").append('<option value="freestyle">Freestyle</option>');

              $("#product-image").attr("src","css/img/products/designs/viper-thread.jpg");

              $("#design-type").text("Only Standard Designs");
              $("#grip-type").text("Standard Grip");
              $("#shipping-type").text("You pay for shipping");

            }
            if (option=="standard") {
              $("#product-price").html("$20.00");
              $("#custom-design").hide();
              $("#design-select").show();

              $("#design-select option[value='viper-thread']").remove();
              $("#design-select option[value='true-original']").remove();
              $("#design-select option[value='brick-yard']").remove();
              $("#design-select option[value='american-flag']").remove();
              $("#design-select option[value='freestyle']").remove();
              $("#design-select option[value='vortex-illusion']").remove();
              $("#design-select option[value='shadow-x']").remove();
              $("#design-select option[value='rainbow-trout-series']").remove();
              $("#design-select option[value='weaver-series']").remove();
              $("#design-select option[value='quad-hex']").remove();
              $("#design-select option[value='split-tribe']").remove();
              $("#design-select option[value='breast-cancer']").remove();

              $("#design-select").append('<option value="vortex-illusion">Vortex Illusion</option>');
              $("#design-select").append('<option value="shadow-x">Shadow X</option>');
              $("#design-select").append('<option value="rainbow-trout-series">Rainbow Trout Series</option>');
              $("#design-select").append('<option value="weaver-series">Weaver Series</option>');
              $("#design-select").append('<option value="quad-hex">Quad Hex</option>');
              $("#design-select").append('<option value="split-tribe">Split Tribe</option>');
              $("#design-select").append('<option value="breast-cancer">Breast Cancer</option>');

              $("#product-image").attr("src","css/img/products/designs/vortex-illusion.jpg");

              $("#design-type").text("Any Design");
              $("#grip-type").text("Standard Grip");
              $("#shipping-type").text("You pay for shipping");
            }
            if (option=="hydro") {
              $("#product-price").html("$30.00");
              $("#custom-design").hide();
              $("#design-select").show();

              $("#design-select option[value='viper-thread']").remove();
              $("#design-select option[value='true-original']").remove();
              $("#design-select option[value='brick-yard']").remove();
              $("#design-select option[value='american-flag']").remove();
              $("#design-select option[value='freestyle']").remove();
              $("#design-select option[value='vortex-illusion']").remove();
              $("#design-select option[value='shadow-x']").remove();
              $("#design-select option[value='rainbow-trout-series']").remove();
              $("#design-select option[value='weaver-series']").remove();
              $("#design-select option[value='quad-hex']").remove();
              $("#design-select option[value='split-tribe']").remove();
              $("#design-select option[value='breast-cancer']").remove();

              $("#design-select").append('<option value="viper-thread">Viper Thread</option>');
              $("#design-select").append('<option value="true-original">True Original</option>');
              $("#design-select").append('<option value="brick-yard">Brick Yard</option>');
              $("#design-select").append('<option value="american-flag">American Flag</option>');
              $("#design-select").append('<option value="freestyle">Freestyle</option>');
              $("#design-select").append('<option value="vortex-illusion">Vortex Illusion</option>');
              $("#design-select").append('<option value="shadow-x">Shadow X</option>');
              $("#design-select").append('<option value="rainbow-trout-series">Rainbow Trout Series</option>');
              $("#design-select").append('<option value="weaver-series">Weaver Series</option>');
              $("#design-select").append('<option value="quad-hex">Quad Hex</option>');
              $("#design-select").append('<option value="split-tribe">Split Tribe</option>');
              $("#design-select").append('<option value="breast-cancer">Breast Cancer</option>');

              $("#design-type").text("Any Design");
              $("#grip-type").attr("title","Clear coat over the tape to improve durability");
              $("#grip-type").html("Hydro Grip &#9432;");
              $("#shipping-type").text("FREE shipping");
            }
            if (option=="custom") {
              $("#product-price").html("$40.00");
              $("#design-select").hide();
              $("#custom-design").show();

              $("#design-select option[value='viper-thread']").remove();
              $("#design-select option[value='true-original']").remove();
              $("#design-select option[value='brick-yard']").remove();
              $("#design-select option[value='american-flag']").remove();
              $("#design-select option[value='freestyle']").remove();
              $("#design-select option[value='vortex-illusion']").remove();
              $("#design-select option[value='shadow-x']").remove();
              $("#design-select option[value='rainbow-trout-series']").remove();
              $("#design-select option[value='weaver-series']").remove();
              $("#design-select option[value='quad-hex']").remove();
              $("#design-select option[value='split-tribe']").remove();
              $("#design-select option[value='breast-cancer']").remove();

              $("#design-type").text("Fully Custom Design");
              $("#grip-type").attr("title","Clear coat over the tape to improve durability");
              $("#grip-type").html("Hydro Grip &#9432;");
              $("#shipping-type").text("FREE shipping");
            }
          }

          function changeImage() {
            var option = $('#design-select').val();
            if (option=="viper-thread") {
              $("#product-image").attr("src","css/img/products/designs/viper-thread.jpg");
            }
            if (option=="breast-cancer") {
              $("#product-image").attr("src","css/img/products/designs/breast-cancer.jpg");
            }
            if (option=="brick-yard") {
              $("#product-image").attr("src","css/img/products/designs/brick-yard.jpg");
            }
            if (option=="quad-hex") {
              $("#product-image").attr("src","css/img/products/designs/quad-hex.jpg");
            }
            if (option=="rainbow-trout-series") {
              $("#product-image").attr("src","css/img/products/designs/rainbow-trout.jpg");
            }
            if (option=="shadow-x") {
              $("#product-image").attr("src","css/img/products/designs/shadow-x.jpg");
            }
            if (option=="split-tribe") {
              $("#product-image").attr("src","css/img/products/designs/split-tribe.jpg");
            }
            if (option=="true-original") {
              $("#product-image").attr("src","css/img/products/designs/true-original.jpg");
            }
            if (option=="vortex-illusion") {
              $("#product-image").attr("src","css/img/products/designs/vortex-illusion.jpg");
            }
            if (option=="weaver-series") {
              $("#product-image").attr("src","css/img/products/designs/weaver-series.jpg");
            }
            if (option=="freestyle") {
              $("#product-image").attr("src","css/img/products/designs/freestyle.jpg");
            }
            if (option=="american-flag") {
              $("#product-image").attr("src","css/img/products/designs/american-flag.jpg");
            }
          }

        </script>

      </div>
    </div>
  </div>
  <!-- end main -->


<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script>
Vue.component("step-navigation-step", {
    template: "#step-navigation-step-template",

    props: ["step", "currentstep"],

    computed: {
        indicatorclass() {
            return {
                active: this.step.id == this.currentstep,
                complete: this.currentstep > this.step.id
            };
        }
    }
});

Vue.component("step-navigation", {
    template: "#step-navigation-template",

    props: ["steps", "currentstep"]
});

Vue.component("step", {
    template: "#step-template",

    props: ["step", "stepcount", "currentstep"],

    computed: {
        active() {
            return this.step.id == this.currentstep;
        },

        firststep() {
            return this.currentstep == 1;
        },

        laststep() {
            return this.currentstep == this.stepcount;
        },

        stepWrapperClass() {
            return {
                active: this.active
            };
        }
    },

    methods: {
        nextStep() {
            this.$emit("step-change", this.currentstep + 1);

        },

        lastStep() {
            this.$emit("step-change", this.currentstep - 1);
        }
    }
});

new Vue({
    el: "#app",

    data: {
        currentstep: 1,

        steps: [
            {
                id: 1,
                title: "Grip",
                icon_class: "fa fa-cubes"
            },
            {
                id: 2,
                title: "Design",
                icon_class: "fa fa-cogs"
            },
            {
                id: 3,
                title: "Color",
                icon_class: "fa fa-paint-brush"
            },
            {
                id: 4,
                title: "Review",
                icon_class: "far fa-file-alt"
            }
        ]
    },

    methods: {
        stepChanged(step) {
            this.currentstep = step;
        }
    }
});
</script>

  <!-- start insta -->
  <div class="row insta-feed">
    <div class="col-lg-6 text-center insta-feed-header">
      <h2 class="heading">See Our Lastest Designs</h2>
      <div class="insta-feed-link">
        <a href="//instagram.com/tapekings"><i class="fab fa-instagram"></i>tapekings</a><br>
      </div>
    </div>
    <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/e6d821de27085c33af262a8aa36f8d6a.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
  </div>


  <?php include 'inc/footer.php'; ?>
  <script type="text/javascript">
  $(document).ready(function(){
    changeInfo();
    // checkComplete();
  });
  </script>
</body>
