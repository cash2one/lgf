<?php

	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
	
	if($_GET['action']=="add_default_data")		{
        
			   $��Ԫ���   = $_POST['��Ԫ���'];
			   $ҵ������   = $_POST['ҵ������'];
			   $��ϵ��ʽ   = $_POST['��ϵ��ʽ'];
			   $��Ԫ��;   = $_POST['��Ԫ��;'];
			   $��ע       = $_POST['��ע'];
			   $�������   = $_POST['�������'];
			   $ʹ�����   = $_POST['ʹ�����'];
			   $��̯���   = $_POST['��̯���'];
			   $��Ԫ�˿�   = $_POST['��Ԫ�˿�'];
			   $��������   = $_POST['��������'];
			   $�������·�1 = $_POST['�������·�'];
			   //$��ʼʱ��   = $_POST['��ʼʱ��'];
			   //$��ֹʱ��   = $_POST['��ֹʱ��'];
		
			   $��ʼ���·� = date("Y-m",mktime(1,1,1,date("m")-1,date("d"),date("Y")));
			   $�Ʒѷ�ʽ   = $_POST['�Ʒѷ�ʽ'];

		//��ѯ�����Ƿ����
		$sel_sql = "select COUNT(*) AS NUM from wu_wpgfeesdetails where ��Ԫ���='$��Ԫ���' and ��������='$��������' and �������·�='$�������·�1'";
		$sel_rs = $db->Execute($sel_sql);
		$num = $sel_rs->fields['NUM'];
        

		if($num == 0){
           
			   

		      //�õ���ҵ�����ѵ��շѱ�׼
			  $sql = "select * from wu_propertycostsset where ��������='$��������'";
			  $rs = $db->Execute($sql);
			  $rs_a = $rs->GetArray();
			  $���㷽ʽ = $rs_a[0]['���㷽ʽ'];
			  $�շѷ�ʽ = $rs_a[0]['�շѷ�ʽ'];
			  $����     = $rs_a[0]['����'];
			  $�շ����� = $rs_a[0]['�շ�����'];

		   if($�������� == "��ҵ������"){

				   //�жϼƷѷ�ʽ
				   if($�Ʒѷ�ʽ == "�����շ�" or $�Ʒѷ�ʽ == "����"){
					   //�����շѼ���
					   $�����   = $�������+$��̯���;
					   $Ӧ�ɽ�� = $����*$�����;
					   $���� = "1����";
					  
				   }
				   else if($�Ʒѷ�ʽ == "�����շ�")
				   {
						//�������շѽ��м���,ѭ���������������¼
                       //����ʼʱ�����ֹʱ������ַ�������

						$�����   = $�������+$��̯���;
						$Ӧ�ɽ�� = $����*$�����;
						$���� = "1����";

						for($i=1;$i<6;$i++){
                            


							/*
							//�Զ�ȡ������ʼ����ֹʱ������ַ�������
                            $arr1 = explode("-",$��ʼʱ��); 
							$��ʼ��1 = $arr1[0];
							$��ʼ��1 = $arr1[1];
							$��ʼ��11 = $��ʼ��1+$i;
                     echo $��ʼ��11."<br>";
							$��ʼ��1 = $arr1[2];
							if($��ʼ��1>12){
                               $��ʼ�� = $��ʼ��1%12;
                               $��ʼ�� = $��ʼ��1+1;
                    echo "aaa<br>";

                               
							   $��ʼʱ�� = $��ʼ��."-".$��ʼ��."-".$��ʼ��1;
					   
					        }else{

					echo "aaa<br>";
							   $��ʼʱ�� = $��ʼ��1."-".$��ʼ��11."-".$��ʼ��1;

					echo $��ʼʱ��."<br>";
							
							}
                            
							$arr2 = explode("-",$��ֹʱ��);
							$��ֹ��2 = $arr2[0];
							$��ֹ��2 = $arr2[1];
                            $��ֹ��22 = $��ֹ��2+$i;
                    // echo $��ֹ��2."<br>";
							$��ֹ��2 = $arr2[2];
							if($��ֹ��22>12){
                               $��ֹ�� = $��ֹ��22%12;
                               $��ֹ�� = $��ֹ��2+1;
                               
							   $��ֹʱ�� = $��ֹ��."-".$��ֹ��."-".$��ֹ��2;
					   
					        }else{
							   $��ֹʱ�� = $��ֹ��2."-".$��ֹ��22."-".$��ֹ��2;

					//echo $��ֹʱ��."<br>";
							
							}
                            */


							$��ʼʱ�� = date("Y-m-d",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));
							$��ֹʱ�� = date("Y-m-d",mktime(1,1,1,date("m")+$i,date("d"),date("Y")));


							$�������·� = date("Y-m",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));

							$sql = "insert into wu_wpgfeesdetails(��Ԫ���,ҵ������,��ϵ��ʽ,�������,ʹ�����,��̯���,��Ԫ��;,��Ԫ�˿�,��������,�������·�,�Ʒѷ�ʽ,��ʼʱ��,��ֹʱ��,����,����,Ӧ�ɽ��,��ע) values('$��Ԫ���','$ҵ������','$��ϵ��ʽ','$�������','$ʹ�����','$��̯���','$��Ԫ��;','$��Ԫ�˿�','$��������','$�������·�','$�Ʒѷ�ʽ','$��ʼʱ��','$��ֹʱ��','$����','$����','$Ӧ�ɽ��','$��ע')";
							$db->Execute($sql);
						
						}
						
	
				  // exit;


				   }
				   else if($�Ʒѷ�ʽ == "һ���շ�")
				   {
						//��һ���շѽ��м���
						$�����   = $�������+$��̯���;
						$Ӧ�ɽ�� = $����*$�����;
							$���� = "1����";
							for($i=1;$i<12;$i++){

                            $��ʼʱ�� = date("Y-m-d",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));
							$��ֹʱ�� = date("Y-m-d",mktime(1,1,1,date("m")+$i,date("d"),date("Y")));
                            
							$�������·� = date("Y-m",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));

							$sql = "insert into wu_wpgfeesdetails(��Ԫ���,ҵ������,��ϵ��ʽ,�������,ʹ�����,��̯���,��Ԫ��;,��Ԫ�˿�,��������,�������·�,�Ʒѷ�ʽ,��ʼʱ��,��ֹʱ��,����,����,Ӧ�ɽ��,��ע) values('$��Ԫ���','$ҵ������','$��ϵ��ʽ','$�������','$ʹ�����','$��̯���','$��Ԫ��;','$��Ԫ�˿�','$��������','$�������·�','$�Ʒѷ�ʽ','$��ʼʱ��','$��ֹʱ��','$����','$����','$Ӧ�ɽ��','$��ע')";
							$db->Execute($sql);
						}
						
				   
				   }
              
		   
		   }
		   else if($�������� == "������")
		   {
					//�жϼƷѷ�ʽ
				   if($�Ʒѷ�ʽ == "�����շ�" or $�Ʒѷ�ʽ == "����"){
					   //�����շѼ���
					   $Ӧ�ɽ�� = $����*$��̯���;
					   $���� = "1����";
					  
				   }
				   else if($�Ʒѷ�ʽ == "�����շ�")
				   {
						//�������շѽ��м���
							$Ӧ�ɽ�� = $����*$��̯���;
							$���� = "1����";
							for($i=1;$i<6;$i++){

							$��ʼʱ�� = date("Y-m-d",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));
							$��ֹʱ�� = date("Y-m-d",mktime(1,1,1,date("m")+$i,date("d"),date("Y")));
                            
							$�������·� = date("Y-m",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));

							$sql = "insert into wu_wpgfeesdetails(��Ԫ���,ҵ������,��ϵ��ʽ,�������,ʹ�����,��̯���,��Ԫ��;,��Ԫ�˿�,��������,�������·�,�Ʒѷ�ʽ,��ʼʱ��,��ֹʱ��,����,����,Ӧ�ɽ��,��ע) values('$��Ԫ���','$ҵ������','$��ϵ��ʽ','$�������','$ʹ�����','$��̯���','$��Ԫ��;','$��Ԫ�˿�','$��������','$�������·�','$�Ʒѷ�ʽ','$��ʼʱ��','$��ֹʱ��','$����','$����','$Ӧ�ɽ��','$��ע')";
							$db->Execute($sql);
						
						}
				   
				   }
				   else if($�Ʒѷ�ʽ == "һ���շ�")
				   {
						//��һ���շѽ��м���
							$Ӧ�ɽ�� = $����*$��̯���;
						//�Է������·ݽ��д���
							$���� = "1����";

							for($i=1;$i<12;$i++){

                                $��ʼʱ�� = date("Y-m-d",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));
							    $��ֹʱ�� = date("Y-m-d",mktime(1,1,1,date("m")+$i,date("d"),date("Y")));
                            
								$�������·� = date("Y-m",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));

								$sql = "insert into wu_wpgfeesdetails(��Ԫ���,ҵ������,��ϵ��ʽ,�������,ʹ�����,��̯���,��Ԫ��;,��Ԫ�˿�,��������,�������·�,�Ʒѷ�ʽ,��ʼʱ��,��ֹʱ��,����,����,Ӧ�ɽ��,��ע) values('$��Ԫ���','$ҵ������','$��ϵ��ʽ','$�������','$ʹ�����','$��̯���','$��Ԫ��;','$��Ԫ�˿�','$��������','$�������·�','$�Ʒѷ�ʽ','$��ʼʱ��','$��ֹʱ��','$����','$����','$Ӧ�ɽ��','$��ע')";
								$db->Execute($sql);						
							}
				   
				   }
			   
		   
		   }
		   else if($�������� == "���ݹ�����")
		   {
			           //�жϼƷѷ�ʽ
				   if($�Ʒѷ�ʽ == "�����շ�" or $�Ʒѷ�ʽ == "����"){
					   //�����շѼ���
					   $Ӧ�ɽ�� = $����*$��Ԫ�˿�;
					   $���� = "1����";
					  
				   }
				   else if($�Ʒѷ�ʽ == "�����շ�")
				   {
						//�������շѽ��м���
						$Ӧ�ɽ�� = $����*$��Ԫ�˿�;
						$���� = "1����";
						for($i=1;$i<6;$i++){

							$��ʼʱ�� = date("Y-m-d",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));
							$��ֹʱ�� = date("Y-m-d",mktime(1,1,1,date("m")+$i,date("d"),date("Y")));
                            
							$�������·� = date("Y-m",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));

							$sql = "insert into wu_wpgfeesdetails(��Ԫ���,ҵ������,��ϵ��ʽ,�������,ʹ�����,��̯���,��Ԫ��;,��Ԫ�˿�,��������,�������·�,�Ʒѷ�ʽ,��ʼʱ��,��ֹʱ��,����,����,Ӧ�ɽ��,��ע) values('$��Ԫ���','$ҵ������','$��ϵ��ʽ','$�������','$ʹ�����','$��̯���','$��Ԫ��;','$��Ԫ�˿�','$��������','$�������·�','$�Ʒѷ�ʽ','$��ʼʱ��','$��ֹʱ��','$����','$����','$Ӧ�ɽ��','$��ע')";
							$db->Execute($sql);						
						}
				   
				   }
				   else if($�Ʒѷ�ʽ == "һ���շ�")
				   {
						//��һ���շѽ��м���
						$Ӧ�ɽ�� = $����*$��Ԫ�˿�;
						$���� = "1����";
						for($i=1;$i<12;$i++){

							$��ʼʱ�� = date("Y-m-d",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));
							$��ֹʱ�� = date("Y-m-d",mktime(1,1,1,date("m")+$i,date("d"),date("Y")));
                            
							$�������·� = date("Y-m",mktime(1,1,1,date("m")-1+$i,date("d"),date("Y")));

							$sql = "insert into wu_wpgfeesdetails(��Ԫ���,ҵ������,��ϵ��ʽ,�������,ʹ�����,��̯���,��Ԫ��;,��Ԫ�˿�,��������,�������·�,�Ʒѷ�ʽ,��ʼʱ��,��ֹʱ��,����,����,Ӧ�ɽ��,��ע) values('$��Ԫ���','$ҵ������','$��ϵ��ʽ','$�������','$ʹ�����','$��̯���','$��Ԫ��;','$��Ԫ�˿�','$��������','$�������·�','$�Ʒѷ�ʽ','$��ʼʱ��','$��ֹʱ��','$����','$����','$Ӧ�ɽ��','$��ע')";
							$db->Execute($sql);						
						}
				   
				   }
			   
		   
		   }
		   else if($�������� == "װ��Ѻ��")
		   {
				   //װ��Ѻ�𵥼۾͵���Ӧ�ɽ��

				   $Ӧ�ɽ�� = $����;
				   $���� = "1��";
				   
		   
		   }
		   else if($�������� == "��ʱ�Է���")
		   {
				   //��ʱ�Է��þ͵���Ӧ�ɽ��
				   $Ӧ�ɽ�� = $����;
				   $���� = "1��";
		   
		   }
		   else if($�������� == "��������")
		   {
				   //�������þ͵���Ӧ�ɽ��
				   $Ӧ�ɽ�� = $����;
				   $���� = "1��";
		   
		   }

		   $_POST['�������·�'] = $�������·�1;
		   $_POST['����']       = $����;
		   $_POST['����']       = $����;
		   $_POST['Ӧ�ɽ��']   = $Ӧ�ɽ��;


		}else{
		
		    $PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td ><font color=green >
			&nbsp;˵����<BR>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Բ���������������Ѿ����ڣ����������롣 <BR>       
			<center><p><font color=\"red\" size=4><a href=wu1_wpgfeesdetails_newai.php>�������</a></font></p></center>
			</font></td></table>";
			print $PrintText; 
			exit;
	
		}
//exit;
		
	}


		$_GET['��������'] = "��ҵ������,������,���ݹ�����,��λ��,װ��Ѻ��,��ʱ�Է���,��������";


		$filetablename		=	'wu_wpgfeesdetails';
		$parse_filename		=	'wu1_wpgfeesdetails';
		require_once('include.inc.php');

		if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td ><font color=green >
			˵����<BR>
			&nbsp;&nbsp;&nbsp;&nbsp;1 ��ҳ����ʾ��ҵ�����ѡ������ѡ����ݹ����ѡ�װ��Ѻ����ʱ�Է����Լ��������õ��շ���ϸ��<BR>
			&nbsp;&nbsp;&nbsp;&nbsp;2 ����ϸ���ݲ����ظ�����������Ψһ�ĵ�Ԫ��š����������Լ��������·ݽ������á�<BR>
			&nbsp;&nbsp;&nbsp;&nbsp;3 ��Ҫ�Ķ��������ڶ�Ӧ���е���޸ģ����иĶ���<BR>
			&nbsp;&nbsp;&nbsp;&nbsp;4 ��ҵ�������Ǹ��ݶ�Ӧ�ĵ��۳������ڵ�Ԫ�Ľ���������Ϲ�̯������¼���ġ�<BR>
			&nbsp;&nbsp;&nbsp;&nbsp;5 �������Ǹ��ݶ�Ӧ���۳��Ե�Ԫ��̯��������¼��㣬���ݹ����Ѹ��ݶ�Ӧ�ĵ��۳��Ե�Ԫ�ĳ�ס�˿ڰ��¼���ġ�<BR>
			</font></td></table>";
			print $PrintText;
		}
	
	?>