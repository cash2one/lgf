//就诊与流失级联
function jiuzhen_clickOpt() {
//父选择项
    var parent = document.getElementById("jiuzhen_parent");
    var p_value = parent.value;

//子选择项的长度，长度大于0，即将所有选择项清空
    var child = document.getElementById("jiuzhen_child");
    var c_length = child.options.length;
    if (c_length > 0) {
        for (var i = 0; i < c_length; i++) {
            child.options.remove(0);
        }
    }

//重新重建子选择项
    if (p_value == "1") {//父
        var arr = new Array("初诊流失", "复诊流失");
        for ($i = 0; $i <= 1; $i++) {//子
            addOption($i, arr[$i]);
        }
    } else if (p_value == "2") {
        addOption(3, " ");

    } else if (p_value == "4") {
        for ($i = 10; $i <= 13; $i++) {
            addOption($i, $i * $i);
        }
    }
}

//创建子选择项
function addOption(val, txt) {
    var opt = document.createElement("option");//创建一个对象
    opt.text = txt;
    opt.value = val;
    jiuzhen_child.options.add(opt);
}

//科室与诊室，与病种级联
function keshi_clickOpt() {
    //父选择项
    var parent = document.getElementById("keshi_parent");
    var p_value = parent.value;

//    子选择项的长度，长度大于0，即将所有选择项清空
    var keshi_child1 = document.getElementById("keshi_child1");
    var c_length1 = keshi_child1.options.length;
    if (c_length1 > 0) {
        for (var i = 0; i < c_length1; i++) {
            keshi_child1.options.remove(0);
        }
    }
    
    var keshi_child2 = document.getElementById("keshi_child2");
    var c_length2 = keshi_child2.options.length;
    if (c_length2 > 0) {
        for (var j = 0; j < c_length2; j++) {
            keshi_child2.options.remove(0);
        }
    }

//重新重建子选择项

switch(p_value){
    case "1":
        var arr = new Array("感冒","胃炎","支气管炎","冠/肺心病","三高","糖尿病","腹泻","脑A/硬化供血不足","其他","体检");
        for ($k = 0; $k <= 9; $k++) {//子
            addOption1($k, arr[$k]);
        }
        break;
    case "2":
        var arr = new Array("腋臭","痔疮.肛痿","肝胆胰脾","肾结石","骨科","阑尾疝气","外伤","V曲张","普外","腹/胸痛","其他","体检");
        for ($k = 0; $k <= 11; $k++) {//子
            addOption1($k, arr[$k]);
        }
        break;
    case "3":
        var arr = new Array("包皮包茎","前列腺","早泄阳痿","性功","湿疣疱疹","不孕不育","生殖感染","附睾囊肿","男科检查","HPV/TP/淋病","阴茎短小","皮肤病","其他");
        for ($k = 0; $k <= 12; $k++) {//子
            addOption1($k, arr[$k]);
        }
        break;
    case "4":
        var arr1 = new Array("早孕","中孕","宫颈","炎症","内分泌/痛经","妇检肌瘤/囊肿","积液","上环取环","不孕","宫外孕","整形","功血","乳腺","外阴白斑","HPV/Tp","其他","体检");
        for ($k = 0; $k <= 17; $k++) {//子
            addOption1($k, arr1[$k]);
        }
        
        var arr2 = new Array("一诊室","二诊室","三诊室");
        for ($k = 0; $k <= 2; $k++) {//子
            addOption2($k, arr2[$k]);
        }
        
        break;
    case "5":
        var arr = new Array("孕检","中孕","晚孕","产后体检");
        for ($k = 0; $k <= 3; $k++) {//子
            addOption1($k, arr[$k]);
        }
        break;
    case "6":
        var arr = new Array("鼻炎","咽炎","耳","眼睛","口腔","取异物","其他","体检");
        for ($k = 0; $k <= 7; $k++) {//子
            addOption1($k, arr[$k]);
        }
        break;
    case "7":
        var arr = new Array("肩周/关节炎","颈椎病","腰椎突出","风湿","其他","体检");
        for ($k = 0; $k <= 5; $k++) {//子
            addOption1($k, arr[$k]);
        }
        break;
    case "8":
        var arr = new Array("上感","支气管炎","腰痛","眩晕/心悸","其他","体检");
        for ($k = 0; $k <= 5; $k++) {//子
            addOption1($k, arr[$k]);
        }
        break;
}

//    if (p_value == "1") {//父
//        var arr = new Array("感冒","胃炎","支气管炎","冠/肺心病","三高","糖尿病","腹泻","脑A/硬化供血不足","其他","体检");
//        for ($k = 0; $k <= 2; $k++) {//子
//            addOption1($k, arr[$k]);
//        }
//    } else if (p_value == "2") {
//        addOption(3, " ");
//
//    } else if (p_value == "3") {
//        for ($i = 10; $i <= 13; $i++) {
//            addOption($i, $i * $i);
//        }
//    }
}

//创建子选择项
function addOption1(val, txt) {
    var opt = document.createElement("option");//创建一个对象
    opt.text = txt;
    opt.value = val;
    keshi_child1.options.add(opt);
}

function addOption2(val, txt) {
    var opt = document.createElement("option");//创建一个对象
    opt.text = txt;
    opt.value = val;
    keshi_child2.options.add(opt);
}

