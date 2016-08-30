<!--批量增加输入文本框模板，包括普通方式和for循环方式-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>用户登录</title>
        <script type="text/javascript">
            i = 1;
            function addrow() {
                var tr = document.createElement("tr");
                document.getElementById("table1").appendChild(tr);
                tr.id = "tr" + i;
                var input1 = document.createElement("input");
                input1.type = "text";
                input1.size = "6";
                var input2 = document.createElement("input");
                input2.type = "text";
                input2.size = "6";
                var input3 = document.createElement("input");
                input3.type = "text";
                input3.size = "6";
                var input4 = document.createElement("input");
                input4.type = "text";
                input4.size = "6";
                var input5 = document.createElement("input");
                input5.type = "text";
                input5.size = "6";
                var input6 = document.createElement("input");
                input6.type = "text";
                input6.size = "6";
                var input7 = document.createElement("input");
                input7.type = "text";
                input7.size = "6";
                var input8 = document.createElement("input");
                input8.type = "text";
                input8.size = "6";
                var tr = document.createElement("tr");
                tr.id = "tr" + i;
                var td1 = document.createElement("td");
                td1.id = "td1" + i;
                var td2 = document.createElement("td");
                td2.id = "td2" + i;
                var td3 = document.createElement("td");
                td3.id = "td3" + i;
                var td4 = document.createElement("td");
                td4.id = "td4" + i;
                var td5 = document.createElement("td");
                td5.id = "td5" + i;
                var td6 = document.createElement("td");
                td6.id = "td6" + i;
                var td7 = document.createElement("td");
                td7.id = "td7" + i;
                var td8 = document.createElement("td");
                td8.id = "td8" + i;
                document.getElementById("tr" + i).appendChild(td1);
                document.getElementById("tr" + i).appendChild(td2);
                document.getElementById("tr" + i).appendChild(td3);
                document.getElementById("tr" + i).appendChild(td4);
                document.getElementById("tr" + i).appendChild(td5);
                document.getElementById("tr" + i).appendChild(td6);
                document.getElementById("tr" + i).appendChild(td7);
                document.getElementById("tr" + i).appendChild(td8);
                document.getElementById("td1" + i).appendChild(input1);
                document.getElementById("td2" + i).appendChild(input2);
                document.getElementById("td3" + i).appendChild(input3);
                document.getElementById("td4" + i).appendChild(input4);
                document.getElementById("td5" + i).appendChild(input5);
                document.getElementById("td6" + i).appendChild(input6);
                document.getElementById("td7" + i).appendChild(input7);
                document.getElementById("td8" + i).appendChild(input8);
                i++;
            }

            function addrow_as_for() {
                var input = new Array();
                var td = new Array();
                var tr = document.createElement("tr");
                document.getElementById("table1").appendChild(tr);
                tr.id = "tr" + i;
                for (x = 0; x < 8; x++) {
                    input[x] = document.createElement("input");
                    input[x].type = "text";
                    input[x].size = "6";
                    td[x] = document.createElement("td");
                    td[x].id = "td" + x + i;
                    document.getElementById("tr" + i).appendChild(td[x]);
                    document.getElementById("td" + x + i).appendChild(input[x]);
                }
                i++;
            }
        </script>
    </head>
    <body id="userlogin_body">
        <form>
            <div>
                <input type="submit" id="list_add" value="增加一行" onclick="addrow();
                        return false;"/>
                <input type="submit" id="list_add" value="增加一行 as for" onclick="addrow_as_for();
                        return false;"/>
            </div>
            <table id="table1" border="1">
                <tr>
                    <td width="74" align="center"><span>列一</span></td>
                    <td width="74" align="center"><span>列二</span></td>
                    <td width="74" align="center"><span>列三</span></td>
                    <td width="74" align="center"><span>列四</span></td>
                    <td width="74" align="center"><span>列五</span></td>
                    <td width="74" align="center"><span>列六</span></td>
                    <td width="74" align="center"><span>列七</span></td>
                    <td width="74" align="center"><span>列八</span></td>
                </tr>
            </table>
        </form>
    </body>
</html>