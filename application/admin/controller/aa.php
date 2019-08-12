<?php

namespace app\admin\controller;

use app\api\controller\Common;
use app\common\controller\Backend;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use think\Db;
use Endroid\QrCode\QrCode;

/**
 * 设备管理
 *
 * @icon fa fa-circle-o
 */
class DeviceItem extends Backend
{

    /**
     * DeviceItem模型对象
     * @var \app\admin\model\DeviceItem
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\DeviceItem;
        $this->view->assign("switchList", $this->model->getSwitchList());
        $this->view->assign("statusList", $this->model->getStatusList());
    }

    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */


    /**
     * 查看
     */
    public function index()
    {
        //当前是否为关联查询
        $this->relationSearch = true;
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax()) {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField')) {
                return $this->selectpage();
            }
            $admin = $this->auth->getUserInfo();
            $where1 = [];
            if ($admin['company_id']) {
                $where1['company_id'] = $admin['company_id'];
            }
            $status = input('status');
            if ($status == 1) {
                $where1['company_id'] = ['neq', 0];
            } else {
                $where1['company_id'] = ['eq', 0];
            }
//            var_dump($where1);exit;
            list($where, $sort, $order, $offset, $limit) = $this->buildparams('id,name,device_code,device_model,contract_num,inspector,project_num');
            $total = $this->model
                ->with(['devicebrand', 'deviceruntime', 'company'])
                ->where($where)
                ->where($where1)
                ->order($sort, $order)
                ->count();

            $list = $this->model
                ->with(['devicebrand', 'deviceruntime', 'company'])
                ->where($where)
                ->where($where1)
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();

            foreach ($list as $row) {
                $row->visible(['id', 'name', 'imgs', 'brand_id', 'device_remark', 'device_code', 'device_model', 'inspector', 'contract_num', 'project_num', 'code_img', 'company_id', 'install_address', 'lat', 'lng', 'switch', 'weigh', 'buildtime', 'createtime', 'updatetime']);
                $row->visible(['devicebrand']);
                $row->getRelation('devicebrand')->visible(['name']);
                $row->visible(['deviceruntime']);
                $row->getRelation('deviceruntime')->visible(['id', 'device_id', 'belt_runtime', 'elastic_runtime', 'hydraulic_runtime', 'elastic_time', 'ud_time', 'runtime']);
                $row->visible(['company']);
                $row->getRelation('company')->visible(['name']);
            }
            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }

    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            if ($params) {
                $params = $this->preExcludeFields($params);

                if ($this->dataLimit && $this->dataLimitFieldAutoFill) {
                    $params[$this->dataLimitField] = $this->auth->id;
                }
                $result = false;
                $this->model->startTrans();
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $name = str_replace("\\model\\", "\\validate\\", get_class($this->model));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.add' : $name) : $this->modelValidate;
                        $this->model->validateFailException(true)->validate($validate);
                    }


                    $result = $this->model->allowField(true)->save($params);
                    $id = $this->model->id;
                    // 生成二维码
                    $params['code_img'] = $this->get_qrcode($params,$id);
//                    var_dump($params);exit;
                    $result = $this->model->allowField(true)->save($params);
                    $this->model->commit();
                } catch (ValidateException $e) {
                    $this->model->rollback();
                    $this->error($e->getMessage());
                } catch (PDOException $e) {
                    $this->model->rollback();
                    $this->error($e->getMessage());
                } catch (Exception $e) {
                    $this->model->rollback();
                    $this->error($e->getMessage());
                }
                if ($result !== false) {
                    $this->success();
                } else {
                    $this->error(__('No rows were inserted'));
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        return $this->view->fetch();
    }

    /**
     * 编辑
     */
    public function edit($ids = null)
    {
        $row = $this->model->get($ids);
        if (!$row) {
            $this->error(__('No Results were found'));
        }
        $adminIds = $this->getDataLimitAdminIds();
        if (is_array($adminIds)) {
            if (!in_array($row[$this->dataLimitField], $adminIds)) {
                $this->error(__('You have no permission'));
            }
        }
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            if ($params) {
                $params = $this->preExcludeFields($params);
                $result = false;
                $this->model->startTrans();
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $name = str_replace("\\model\\", "\\validate\\", get_class($this->model));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.edit' : $name) : $this->modelValidate;
                        $row->validateFailException(true)->validate($validate);
                    }

//                    var_dump($row->id);exit;
                    // 生成二维码
                    $params['code_img'] = $this->get_qrcode($params,$row->id);
                    $result = $row->allowField(true)->save($params);

                    $this->model->commit();
                } catch (ValidateException $e) {
                    $this->model->rollback();
                    $this->error($e->getMessage());
                } catch (PDOException $e) {
                    $this->model->rollback();
                    $this->error($e->getMessage());
                } catch (Exception $e) {
                    $this->model->rollback();
                    $this->error($e->getMessage());
                }
                if ($result !== false) {
                    $this->success();
                } else {
                    $this->error(__('No rows were updated'));
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        $this->view->assign("row", $row);
        return $this->view->fetch();
    }

    /*
     * 设备详情
     * */
    public function detail()
    {
        $id = input('device_id');
        $info = Db::name('device_item')
            ->field('di.*,di.id as di_id,dr.*,dr.id as dr_id,c.name')
            ->alias('di')
            ->join('company c', 'c.id = di.company_id', 'LEFT')
            ->join('device_runtime dr', 'dr.device_id = di.id', 'LEFT')
            ->where('di.id', $id)
            ->find();
//        dump($info);
        $this->view->assign('info', $info);
        return $this->view->fetch();
    }

    /*
     * 设备保修记录
     * */
    public function order()
    {
        $id = input('device_id');
        $list = Db::name('order')
            ->alias('o')
            ->join('device_item d', 'd.id = o.device_id', 'LEFT')
            ->where('o.device_id', $id)
            ->select();

        $this->view->assign('list', $list);
        return $this->view->fetch();
    }


    /*
     * 生成二维码
     * */
    public function get_qrcode($params,$id)
    {
        $text['code'] = $params['device_code']; //code
        $text['device_id'] = $id; //id
        $text = \GuzzleHttp\json_encode($text);
        $qrCode = new QrCode();
        $qrCode->setText($text)->setSize('200')->setImageType(QrCode::IMAGE_TYPE_PNG);
        //创建文件夹
        $path = date("Y/m/d", time());
        $d_path = dirname(dirname(dirname(__DIR__))) . "/public/qrcode/{$path}/";
        $dir_path = str_replace('\\', '/', $d_path);
        if (!is_dir($dir_path)) {
            mkdir($dir_path, 0777, true);
        }
        $name = '/' . $params['device_code'] . datetime(time()) . '.png';
        $file_name = '/qrcode/' . $path . $name;
        $data = $qrCode->save($dir_path . $name);
        if ($data) {
            return $file_name;
        }
        return false;
    }

    /*
     * 二维码导出
     * */
    public function download()
    {
        $id_start = input('start');
        $id_end = input('end');

        $data = Db::name('device_item')
            ->field('id,code_img')
            ->where('id','between',[$id_start,$id_end])
            ->select();
//        var_dump($data);exit;
        if(!$data) $this->error('区间设置错误');
        $zipName=dirname(dirname(dirname(dirname(__FILE__))))."/downLoad".time().".zip";//zip name
        $zip = new \ZipArchive();//新建zip对象
        //打开zip对象
        $res = $zip->open($zipName, \ZipArchive::CREATE);
        if ($res) {
            foreach($data as $val){
                $file_name = $val['code_img'];

                $filePath = '/home/wwwroot/ssj/public' . $file_name;//拼接要下载文件的具体路径(之前只是文件夹路径)

                //将文件遍历填充
                if(file_exists($filePath)){
                    $new_filename = substr($file_name, strrpos($file_name, '/'));
                    $zip->addFile( $filePath, $new_filename);
                }
            }
            $zip->close();

            $fileHandle = fopen($zipName, "r");//打开文件
            if ($fileHandle == false) exit("不能打开" . $zipName);//打开失败
            $file_size = filesize($zipName);
//             设置HTTP header
            header('Content-Description: File Transfer');
            header("Content-Type: application/zip"); //zip格式
            header("Content-Transfer-Encoding: binary");//指示标识函数(即没有压缩，也没有修改)
            header("Accept-Ranges: bytes");//范围的单位是字节。
            header("Content-Length: " . $file_size);//文件大小
            header('Content-Disposition:attachment;filename=download_'.date('Y-m-d H:i:s').'.zip'); //触发浏览器文件下载功能,定义下载的文件名
            $buffer=1024; //设置一次读取的字节数，每读取一次，就输出数据（即返回给浏览器）
            $file_count=0; //读取的总字节数
            // 开启缓冲区
            ob_clean();
            ob_start();
            //向浏览器返回数据 如果下载完成就停止输出，如果未下载完成就一直在输出。根据文件的字节大小判断是否下载完成
            while(!feof($fileHandle) && $file_count<$file_size){
                $file_con=fread($fileHandle,$buffer);
                $file_count+=$buffer;
                echo $file_con;
                ob_flush(); // 刷新PHP缓冲区到Web服务器
                flush(); // 刷新Web服务器缓冲区到浏览器
            }

            ob_end_clean();// 关闭缓冲区
            fclose($fileHandle);//关闭文件指针
//            while (!feof($fileHandle)) echo fread($fileHandle, 10240);//读取文件

            if($file_count >= $file_size) {
                unlink($zipName);//下载完成后删除压缩包
            }
        }
    }

    /*
     * excel导入
     * */
    public function import(){
        return parent::import();
    }

    /*
     * 设置 字段-数据转换函数 键值对数组
     */
    protected function setDataConversionFunMap()
    {
        $dataConversionFunMap['buildtime'] = function ($v) {
            if($v) {
                $res = Date::excelToTimestamp($v,'Asia/Shanghai');
                return $res;
            }
            return time();
        };
        $this->dataConversionFunMap = $dataConversionFunMap;
    }
}
