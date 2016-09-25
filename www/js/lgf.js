//就诊与流失级联
function jiuzhen_clickOpt(ide) {
//父选择项
    var n=ide.substring(14,15);
    var parent = document.getElementById(ide);
    var p_value = parent.value;

//子选择项的长度，长度大于0，即将所有选择项清空
        var child = document.getElementById("jiuzhen_child" + n);
        var c_length = child.options.length;
        if (c_length > 0) {
            for (var i = 0; i < c_length; i++) {
                child.options.remove(0);
            }
        }
    
//重新重建子选择项
        if (p_value == "1") {//父
            var arr = new Array("","初诊流失", "复诊流失");
            for ($i = 0; $i <= 2; $i++) {//子
                addOption(n, $i, arr[$i]);
            }
        }
        else{
            addOption(n,3," ");
        }
}

//创建子选择项
function addOption(num, val, txt) {
    var opt = document.createElement("option");//创建一个对象
    opt.text = txt;
    opt.value = val;
    id="jiuzhen_child"+num;
    document.getElementById(id).options.add(opt);
}

//科室与诊室，与病种级联
function keshi_clickOpt(ide) {
    //父选择项
    var n=ide.substring(12,13);
    var parent = document.getElementById(ide);
    var p_value = parent.value;
//    alert(p_value);
//    子选择项的长度，长度大于0，即将所有选择项清空
    var zhenshi_child = document.getElementById("zhenshi_child"+n);
    var c_length1 = zhenshi_child.options.length;
    if (c_length1 > 0) {
        for (var i = 0; i < c_length1; i++) {
            zhenshi_child.options.remove(0);
        }
    }
    
    var bingzhong_child = document.getElementById("bingzhong_child"+n);
    var c_length2 = bingzhong_child.options.length;
    if (c_length2 > 0) {
        for (var j = 0; j < c_length2; j++) {
            bingzhong_child.options.remove(0);
        }
    }

//重新重建子选择项

switch(p_value){
    case "1":
            var arr = new Array("感冒","胃炎","支气管炎","冠/肺心病","三高","糖尿病","腹泻","脑A/硬化供血不足","其他","体检");
        for ($k = 0; $k <= 9; $k++) {//子
            addOption1(n, $k, arr[$k]);
        }
        addOption2(n,0," ");
        break;
    case "2":
        var arr = new Array("腋臭","痔疮.肛痿","肝胆胰脾","肾结石","骨科","阑尾疝气","外伤","V曲张","普外","腹/胸痛","其他","体检");
        for ($k = 0; $k <= 11; $k++) {//子
            addOption1(n, $k, arr[$k]);
        }
        addOption2(n,0," ");
        break;
    case "3":
        var arr = new Array("包皮包茎","前列腺","早泄阳痿","性功","湿疣疱疹","不孕不育","生殖感染","附睾囊肿","男科检查","HPV/TP/淋病","阴茎短小","皮肤病","其他");
        for ($k = 0; $k <= 12; $k++) {//子
            addOption1(n, $k, arr[$k]);
        }
        addOption2(n,0," ");
        break;
    case "4":
        var arr1 = new Array("早孕","中孕","宫颈","炎症","内分泌/痛经","妇检肌瘤/囊肿","积液","上环取环","不孕","宫外孕","整形","功血","乳腺","外阴白斑","HPV/Tp","其他","体检");
        for ($k = 0; $k <= 17; $k++) {//子
            addOption1(n, $k, arr1[$k]);
        }
        
        var arr2 = new Array("一诊室","二诊室","三诊室");
        for ($k = 0; $k <= 2; $k++) {//子
            addOption2(n, $k, arr2[$k]);
        }
        
        break;
    case "5":
        var arr = new Array("孕检","中孕","晚孕","产后体检");
        for ($k = 0; $k <= 3; $k++) {//子
            addOption1(n, $k, arr[$k]);
        }
        addOption2(n,0," ");
        break;
    case "6":
        var arr = new Array("鼻炎","咽炎","耳","眼睛","口腔","取异物","其他","体检");
        for ($k = 0; $k <= 7; $k++) {//子
            addOption1(n, $k, arr[$k]);
        }
        addOption2(n,0," ");
        break;
    case "7":
        var arr = new Array("肩周/关节炎","颈椎病","腰椎突出","风湿","其他","体检");
        for ($k = 0; $k <= 5; $k++) {//子
            addOption1(n, $k, arr[$k]);
        }
        addOption2(n,0," ");
        break;
    case "8":
        var arr = new Array("上感","支气管炎","腰痛","腰痛","其他","体检");
        for ($k = 0; $k <= 5; $k++) {//子
            addOption1(n, $k, arr[$k]);
        }
        addOption2(n,0," ");
        break;
}
}

//创建子选择项
function addOption1(num, val, txt) {
    var opt = document.createElement("option");//创建一个对象
    opt.text = txt;
    opt.value = val;
    id="bingzhong_child"+num;
    document.getElementById(id).options.add(opt);
}

function addOption2(num, val, txt) {
    var opt = document.createElement("option");//创建一个对象
    opt.text = txt;
    opt.value = val;
    id="zhenshi_child"+num;
    document.getElementById(id).options.add(opt);
}

//function addOption3(num, val, txt) {
//    var opt = document.createElement("option");//创建一个对象
//    opt.text = txt;
//    opt.value = val;
//    id="xingbie"+num;
//    document.getElementById(id).options.add(opt);
//}


/*动态表格,为表格添加行,删除行操作*/
function delrow() {
    var i = tb.rows.length;
    if(i>2)
    tb.deleteRow(i - 1);
}
function addrow(yiyuan) {
var i = tb.rows.length-1;
var tr = document.createElement('tr');
        td1 = document.createElement('td');
        td1.innerHTML = '<input type="text" name="yiyuan'+i+'" value="'+yiyuan+'" readonly="readonly"/>';
        tr.appendChild(td1);

        td2 = document.createElement('td');
        td2.innerHTML = '<select id="jiuzhen_parent'+i+'" name="chufuzhen'+i+'" onchange="jiuzhen_clickOpt(this.id)"><option value="1">初诊</option><option value="2">复诊</option></select>';
        tr.appendChild(td2);

        td3 = document.createElement('td');
        td3.innerHTML = '<select id="jiuzhen_child'+i+'" name="liushi'+i+'"><option value="0"></option><option value="1">初诊流失</option><option value="2">复诊流失</option></select>';
        tr.appendChild(td3);

        td4 = document.createElement('td');
        td4.innerHTML = '<select id="keshi_parent'+i+'" name="keshi'+i+'" onchange="keshi_clickOpt(this.id)"><option value="1">内科</option><option value="2">外科</option><option value="3">男科</option><option value="4">妇科</option><option value="5">产科</option><option value="6">耳鼻喉</option><option value="7">疼痛科</option><option value="8">中医</option><option value="9">其他</option></select>';
        tr.appendChild(td4);

        td5 = document.createElement('td');
        td5.innerHTML = '<select id="zhenshi_child'+i+'" name="zhenshi'+i+'"><option></option></select>';
        tr.appendChild(td5);

        td6 = document.createElement('td');
        td6.innerHTML = '<select id="bingzhong_child'+i+'" name="bingzhong'+i+'"><option value="1">感冒</option><option value="2">胃炎</option><option value="3">支气管炎</option><option value="4">冠/肺心病</option><option value="5">三高</option><option value="6">糖尿病</option><option value="7">腹泻</option><option value="8">脑A/硬化供血不足</option><option value="9">其他</option><option value="10">体检</option></select>';
        tr.appendChild(td6);

        td7 = document.createElement('td');
        td7.innerHTML = '<select name="laiyuanqudao'+i+'" id="laiyuanqudao'+i+'"><option>网络</option><option>电话</option><option>QQ</option><option>杂志</option><option>市场</option><option>持卡</option><option>路过</option><option>附近</option><option>介绍</option><option>来过</option><option>会员证</option></select>';
        tr.appendChild(td7);

        td8 = document.createElement('td');
        td8.innerHTML = '<input type="text" size="4" name="nianling'+i+'" id="nianling'+i+'" value="0"/>';
        tr.appendChild(td8);

        td9 = document.createElement('td');
        td9.innerHTML = '<select name="xingbie'+i+'" id="xingbie'+i+'"><option>男</option><option selected>女</option></select>';
        tr.appendChild(td9);

        td10 = document.createElement('td');
        td10.innerHTML = '<select name="quyu'+i+'" id="quyu'+i+'"><option>县城</option><option>广顺</option><option>杜家坝</option></select>';
        tr.appendChild(td10);

        td11 = document.createElement('td');
        td11.innerHTML = '<select name="shouzhuyuan'+i+'" id="shouzhuyuan'+i+'"><option>是</option><option selected="selected">否</option></select>';
        tr.appendChild(td11);

        td12 = document.createElement('td');
        td12.innerHTML = '<select name="zhiliao'+i+'" id="zhiliao'+i+'"><option>是</option><option selected="selected">否</option></select>';
        tr.appendChild(td12);

        td13 = document.createElement('td');
        td13.innerHTML = '<input type="text" size="8" name="zhiliaofei'+i+'" id="zhiliaofei'+i+'" value="0"/>';
        tr.appendChild(td13);

        td14 = document.createElement('td');
        td14.innerHTML = '<select name="shoushu'+i+'" id="shoushu'+i+'"><option>是</option><option selected="selected">否</option></select>';
        tr.appendChild(td14);

        td15 = document.createElement('td');
        td15.innerHTML = '<input type="text" size="8" name="shoushufei'+i+'" id="shoushufei'+i+'" value="0" />';
        tr.appendChild(td15);

        td16 = document.createElement('td');
        td16.innerHTML = '<input type="text" size="8" name="menzhenxiaofei'+i+'" id="menzhenxiaofei'+i+'" value="0" />';
        tr.appendChild(td16);

tb.tBodies[0].appendChild(tr);
}

