<?php

defined('BASEPATH') or exit('No direct script access allowed');
// date_default_timezone_set('Asia/Kolkata');

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check_partnersession();
        $this->load->model('Order_model');
        $this->partner_id = $_SESSION['userid'];
        $this->category = $_SESSION['usercategory'];
    }

    public function order($id)
    {
        if ($id == 1) {
            if ($this->category == 1) {
                $Title = 'Pending Order';
            } elseif ($this->category == 2) {
                $Title = 'Pending Request';
            } elseif ($this->category == 3) {
                $Title = 'Pending Appoitment';
            }
        } elseif ($id == 2) {
            if ($this->category == 1) {
                $Title = 'Approved Order';
            } elseif ($this->category == 2) {
                $Title = 'Accepted Request';
            } elseif ($this->category == 3) {
                $Title = 'Accepted Request';
            }
        } elseif ($id == 3) {
            if ($this->category == 1) {
                $Title = 'Dispatched Order';
            } elseif ($this->category == 2) {
                $Title = 'Sample Collected';
            } elseif ($this->category == 3) {
                $Title = 'Completed Appointment';
            }
        } elseif ($id == 4) {
            if ($this->category == 1) {
                $Title = 'Deliverd Order';
            } elseif ($this->category == 2) {
                $Title = 'Deliverd Report';
            } elseif ($this->category == 3) {
                $Title = 'Deliverd Report';
            }
        } elseif ($id == 5) {
            if ($this->category == 1) {
                $Title = 'Cancelled Order';
            } elseif ($this->category == 2) {
                $Title = 'Cancelled Request';
            } elseif ($this->category == 3) {
                $Title = 'Cancelled Request';
            }
        } elseif ($id == 6) {
            if ($this->category == 1) {
                $Title = 'Rejected Order';
            } elseif ($this->category == 2) {
                $Title = 'Rejected Request';
            } elseif ($this->category == 3) {
                $Title = 'Rejected Request';
            }
        } elseif ($id == 7) {
            if ($this->category == 2) {
                $Title = 'Pending Sample Collect';
            } elseif ($this->category == 3) {
                $Title = 'Booking Appointment';
            }
        } elseif ($id == 8) {
            if ($this->category == 2) {
                $Title = 'Pending Report';
            } elseif ($this->category == 3) {
                $Title = 'Pending Report';
            }
        }
        $data['error'] = '';
        $data['title'] = $Title;

        if ($this->partner_id >= 1) {
            $data['reportdata'] = $this->Order_model->get_order_report($this->category, $this->partner_id, $id);

            // echo $this->db->last_query();
            // echo "<pre>";
            // print_r($data["reportdata"]); die;
            $this->load->ptemplate('partner/order/order_list', $data);
        } else {
            redirect('partners/login');
        }
    }

    public function view($id)
    {
        $data['error'] = '';
        if ($this->category == 1) {
            $Title = 'View Order';
        } elseif ($this->category == 2) {
            $Title = 'View Request';
        } elseif ($this->category == 3) {
            $Title = 'View Appoitment';
        }
        $data['title'] = $Title;

        $this->load->model('admin_model');
        $data['app_setting'] = $this->admin_model->get_appsetting();

        if ($this->partner_id >= 1) {
            $data['reportdata'] = $this->Order_model->get_order_by_id($this->category, $id);
            $data['prescription'] = $this->Order_model->get_order_prescription($id);
            $data['items'] = '';

            if ($this->category == 1) { //Pharmcy
                $data['items'] = $this->Order_model->get_items_by_order_no($this->partner_id, $id);

            // print_r('<pre>');
                    // print_r(unserialize($data["items"][1]['medicine_serialize']));die;
            } elseif ($this->category == 2) { //Pathology
                $data['items'] = $this->Order_model->get_test_by_order_no($this->partner_id, $id);
            } elseif ($this->category == 3) { //Radiology
                $data['items'] = $this->Order_model->get_radiotest_by_order_no($this->partner_id, $id);
            }

            $ddata['is_admin_view'] = '1';
            $this->load->model('common_model');
            $this->common_model->data_update('tbl_notification', $ddata, ['order_no' => $id, 'partener_id' => $this->partner_id]);

            $this->load->ptemplate('partner/order/order_view', $data);
        } else {
            redirect('partners/login');
        }
    }

    public function changeStatus()
    {
        if ($this->partner_id >= 1) {
            $id = $this->uri->segment(3);
            $order_no = $this->uri->segment(3);
            $category = $this->Order_model->get_order_by_id($this->category, $id);
            $customorder_id = $category['customorder_id'];

            $ddata['order_status'] = $this->input->get('status');

            //print_r(json_decode($category['change_status_datetime'],true));die;

            $change_status_datetime = json_decode($category['change_status_datetime'], true);
            $index = count($change_status_datetime);
            $orderStatus['id'] = $this->input->get('status');
            $orderStatus['date'] = date('Y-m-d H:i:s');

            $change_status_datetime[$index] = $orderStatus;
            $ddata['change_status_datetime'] = json_encode($change_status_datetime);
            //print_r($ddata['change_status_datetime']);die;
            if ($this->category == 3 && $ddata['order_status'] == 7) {
                $ddata['appoitment_date'] = $this->input->post('date');
                $ddata['appoitment_time'] = $this->input->post('time');
            }
            if (($this->category == 3 || $this->category == 2) && $ddata['order_status'] == 4) {
                $report_array = [];
                for ($i = 0; $i < count($_FILES['report_pdf']['name']); ++$i) {
                    if ($_FILES['report_pdf']['size'][$i] > 0) {
                        //print_r($_FILES["report_pdf"]["name"][$i]);die;
                        $idatad['name'] = $_FILES['report_pdf']['name'][$i];
                        $idatad['type'] = $_FILES['report_pdf']['type'][$i];
                        $idatad['tmp_name'] = $_FILES['report_pdf']['tmp_name'][$i];
                        $idatad['error'] = $_FILES['report_pdf']['error'][$i];
                        $idatad['size'] = $_FILES['report_pdf']['size'][$i];
                        $config['upload_path'] = './uploads/reports/';
                        $config['allowed_types'] = 'pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode('.', $_FILES['report_pdf']['name'][$i]);
                        $filename = rand(0000, 9999).time().'.'.end($temp);
                        $uploadpath = $this->config->item('attach_reports_path');

                        move_uploaded_file($_FILES['report_pdf']['tmp_name'][$i], $uploadpath.$filename);
                        //$ddata1[] = $file_name;
                        array_push($report_array, $filename);
                        // $j = 1;
                            // for($i = 0; $i<count($ddata1); $i++){
                            //     $arr1['image_'.$j.''] = $ddata1[$i];
                            //     $j++;
                            // }
                    }
                }
                $ddata['attached_reports'] = json_encode($report_array);
            }
            if ($category) {
                $this->load->model('common_model');
                $this->load->model('Api_model');
                $this->common_model->data_update('tbl_order', $ddata, ['id' => $id]);
                if ($ddata['order_status'] == 4) {
                    $data['page_title'] = 'Invoice';
                    $data['reportdata'] = $this->Order_model->get_order_by_id($this->session->userdata('usercategory'), $id);
                    $data['pharmcydata'] = $this->Order_model->get_store_by_id($this->session->userdata('usercategory'), $data['reportdata']['partner_id']);
                    $data['items'] = $this->Order_model->get_items_by_order_no($data['reportdata']['partner_id'], $id);

                    $data['final_amount'] = $this->Order_model->get_amount_by_order_no($data['reportdata']['partner_id'], $id);
                    //print_r($data["final_amount"]);die;
                    $random_no = rand(1111111111, 9999999999).$id;
                    $invoice_name = substr($random_no, -10);
                    $html = $this->load->view('partner/order/invoice', $data, true);
                    $pdfFilename = 'invoice-'.$invoice_name.'.pdf';
                    $pdfsavePath = $this->config->item('invoice_path').$pdfFilename;
                    $this->load->library('Pdf');
                    $this->pdf->pdf->AddPage('P');
                    $this->pdf->pdf->WriteHTML($html);
                    $this->load->model('common_model');
                    if ($data['reportdata']['is_saved_invoice'] == '0' || $data['reportdata']['is_saved_invoice'] == 0) {
                        $sdata['is_saved_invoice'] = '1';
                        $sdata['invoice'] = $pdfFilename;
                        $this->common_model->data_update('tbl_order', $sdata, ['id' => $id]);
                        $this->pdf->pdf->Output($pdfsavePath, 'F');
                    }
                }
                $appoitmentRecord = $this->Api_model->getusername($id);

                if ($ddata['order_status'] == 1) {
                    if ($this->category == 1) {
                        $message = 'Your Order Now been Created. View Order Details';
                        $title = 'Medicine Order Created';
                    } else {
                        $message = 'You’re Booking Now been Created. View Order Details';
                        $title = 'Booking Status';
                    }
                } elseif ($ddata['order_status'] == 2) {
                    if ($this->category == 1) {
                        $message = 'Your Medicine Order with '.$category['customorder_id'].' Has Been Accepted By Pharmcy.';
                        $title = 'Order Status';
                    } elseif ($this->category == 2) {
                        $message = 'Your Booking For Lab Test with '.$category['customorder_id'].' Has Been Accepted By Lab';
                        $title = 'Booking Status';
                    } elseif ($this->category == 3) {
                        $message = 'Your Booking For Radiodiagnostic with '.$category['customorder_id'].' Has Been Accepted By Radiodiagnostic';
                        $title = 'Booking Status';
                    }
                } elseif ($ddata['order_status'] == 3) {
                    if ($this->category == 1) {
                        $message = 'Your Medicine Order with '.$category['customorder_id'].' Has Been Dispatched By Pharmcy.';
                        $title = 'Order Status';
                    } elseif ($this->category == 3) {
                        $message = 'Appoitment is now completed for your Radiodiagnostic booking of '.$category['customorder_id'];
                        $title = 'Booking Status';
                    } else {
                        $message = 'Sample is now collected for your lab booking of'.$category['customorder_id'];
                        $title = 'Booking Status';
                    }
                } elseif ($ddata['order_status'] == 4) {
                    if ($this->category == 1) {
                        // $message = "New Invoice is generated for your Medicine order with order Id: ".$category['customorder_id'];
                        $message = 'Your Medicine Order with '.$category['customorder_id'].' Has Been Delivered By Pharmcy.';
                        $title = 'Order Status';
                    } elseif ($this->category == 3) {
                        $message = 'Diagnostic reports are delivered for your booking of '.$category['customorder_id'];
                        $title = 'Booking Status';
                    } else {
                        $message = 'Lab reports are Delivered for your lab booking of '.$category['customorder_id'];
                        $title = 'Booking Status';
                    }
                } elseif ($ddata['order_status'] == 5) {
                    if ($this->category == 1) {
                        $message = 'Your Medicine Order with '.$category['customorder_id'].' Has Been Cancelled By Pharmcy.';

                        $title = 'Medicine Order Cancelled';
                    } elseif ($this->category == 3) {
                        $message = 'Your Booking For Radiodiagnostic with '.$category['customorder_id'].' Has Been Accepted By Radiodiagnostic';
                        $title = 'Booking Status';
                    } else {
                        $message = 'Lab Test booking with '.$category['customorder_id'].' Has Been Cancelled By Lab';
                        $title = 'Lab Test Booking Cancelled';
                    }
                } elseif ($ddata['order_status'] == 6) {
                    if (isset($_REQUEST['reason']) && !empty($_REQUEST['reason'])) {
                        $update_data = [];
                        $update_data['reason'] = $_REQUEST['reason'];
                        $this->load->model('common_model');
                        $this->common_model->data_update('tbl_order', $update_data, ['id' => $id]);
                    }

                    if ($this->category == 1) {
                        $message = 'Your Medicine Order with '.$category['customorder_id'].' Has Been Cancelled By Pharmcy for reason ';

                        $title = 'Medicine Order Cancelled';
                    } elseif ($this->category == 3) {
                        $message = 'Your Radiodiagnostic booking with '.$category['customorder_id'].' will be Cancelled By Radiodiagnostic for reason';
                        $title = 'Radiodiagnostic Booking Cancelled';
                    } else {
                        $message = 'Your Booking For Lab Test with '.$category['customorder_id'].' Has Been Cancelled By Lab for reason ';
                        $title = 'Lab Test Booking Cancelled';
                    }
                } elseif ($ddata['order_status'] == 7) {
                    if ($this->category == 3) {
                        $date = $_REQUEST['date'];
                        $time = $_REQUEST['time'];
                        $datetime = $date.$time;
                        $str_date = date('d-m-Y h:i A', strtotime($datetime));

                        $message = 'Your Appoitment For Radiodiagnostic test is booked for '.$str_date;
                        $title = 'Booking Status';
                    } else {
                        $message = 'Your Booking for Lab Test with '.$category['customorder_id'].' are now pending for sample collection';
                        $title = 'Booking Status';
                    }
                } elseif ($ddata['order_status'] == 8) {
                    if ($this->category == 3) {
                        $message = 'Diagnostic reports are pending for final approval';
                        $title = 'Booking Status';
                    } else {
                        $message = 'Lab reports are pending for final approval';
                        $title = 'Booking Status';
                    }
                }

                $notification_insert = [];
                $notification_insert = [
                    'notification_type' => 'U',
                    'partener_id' => $this->partner_id,
                    'category' => $this->category,
                    'patient_id' => $appoitmentRecord->patient_id,
                    'order_id' => $customorder_id,
                    'order_no' => $order_no,
                    'title' => $title,
                    'description' => $message,
                    'is_admin_view' => '0',
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                $this->db->insert('tbl_notification', $notification_insert);

                $notification_insert_patient = [];
                $notification_insert_patient = [
                    'notification_type' => 'U',
                    'partener_id' => $appoitmentRecord->patient_id,
                    'category' => $this->category,
                    'patient_id' => $this->partner_id,
                    'order_id' => $customorder_id,
                    'order_no' => $order_no,
                    'title' => $title,
                    'description' => $message,
                    'is_admin_view' => '0',
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                $this->db->insert('tbl_notification', $notification_insert_patient);

                //$device_token = $this->Api_model->get_user_profile_setting($appoitmentRecord->patient_id);
                $device_token_patient = $this->Api_model->get_user_profile_setting($appoitmentRecord->patient_id);
                $device_token_IOS_patient = $this->Api_model->get_user_profile_IOS($appoitmentRecord->patient_id);

                if ($notification_insert) {
                    $notification_message = [];
                    $notification_message['title'] = $title;
                    $notification_message['body'] = $message;
                    $notification_message['appoitment_id'] = $id;
                    $notification_message['consulation_type'] = $appoitmentRecord->consulation_type;
                    $notification_message['appointment_status'] = $appoitmentRecord->appointment_status;
                    $notification_message['is_followup'] = $appoitmentRecord->is_followup;
                    //$notification_message['sound']='confirmordersound.wav';
                    $this->load->helper('notifications_helper');
                    if (!empty($device_token_patient)) {
                        push_notification_android($device_token_patient['registration_ids'], $notification_message);
                    }
                    if (!empty($device_token_IOS_patient)) {
                        push_notification_IOS($device_token_IOS_patient['registration_ids'], $notification_message);
                    }
                }

                $redirect_url = '';
                if ($this->category == 1) {
                    if ($ddata['order_status'] == 1) {
                        $redirect_url = 'orders/pending-order';
                    } elseif ($ddata['order_status'] == 2) {
                        $redirect_url = 'orders/approved-order';
                    } elseif ($ddata['order_status'] == 3) {
                        $redirect_url = 'orders/dispatch-order';
                    } elseif ($ddata['order_status'] == 4) {
                        $redirect_url = 'orders/delivered-order';
                    } elseif ($ddata['order_status'] == 5) {
                        $redirect_url = 'orders/cancelled-order';
                    } elseif ($ddata['order_status'] == 6) {
                        $redirect_url = 'orders/rejected-order';
                    }
                } elseif ($this->category == 2) {
                    if ($ddata['order_status'] == 1) {
                        $redirect_url = 'requests/pending-request';
                    } elseif ($ddata['order_status'] == 2) {
                        $redirect_url = 'requests/accepted-request';
                    } elseif ($ddata['order_status'] == 3) {
                        $redirect_url = 'requests/sample-collected';
                    } elseif ($ddata['order_status'] == 4) {
                        $redirect_url = 'requests/deliverd-report';
                    } elseif ($ddata['order_status'] == 5) {
                        $redirect_url = 'requests/requests/cancelled-request';
                    } elseif ($ddata['order_status'] == 6) {
                        $redirect_url = 'requests/rejected-request';
                    } elseif ($ddata['order_status'] == 7) {
                        $redirect_url = 'requests/pending-sample-collect';
                    } elseif ($ddata['order_status'] == 8) {
                        $redirect_url = 'requests/pending-report';
                    }
                } elseif ($this->category == 3) {
                    if ($ddata['order_status'] == 1) {
                        $redirect_url = 'requests/pending-request';
                    } elseif ($ddata['order_status'] == 2) {
                        $redirect_url = 'requests/accepted-request';
                    } elseif ($ddata['order_status'] == 3) {
                        $redirect_url = 'requests/appointment-completed';
                    } elseif ($ddata['order_status'] == 4) {
                        $redirect_url = 'requests/deliverd-report';
                    } elseif ($ddata['order_status'] == 5) {
                        $redirect_url = 'requests/cancelled-request';
                    } elseif ($ddata['order_status'] == 6) {
                        $redirect_url = 'requests/rejected-request';
                    } elseif ($ddata['order_status'] == 7) {
                        $redirect_url = 'requests/pending-appointment';
                    } elseif ($ddata['order_status'] == 8) {
                        $redirect_url = 'requests/pending-report';
                    }
                }
                redirect(base_url().$redirect_url);
                exit;
            }
        } else {
            redirect('partners/login');
        }
    }

    public function prescription_download($id)
    {
        $this->load->helper('download');
        $data['store_images'] = $this->Order_model->get_prescription_by_id($id);
        $filename = 'prescription-'.rand(111111, 999999);
        $filepath = 'uploads/prescription/';

        $file = FCPATH.$filepath.$data['store_images']['filename'];

        $fname = explode('.', $data['store_images']['filename']);
        $extension = end($fname);

        $name = $filename.'.'.$extension;
        $data = file_get_contents($file);
        force_download($name, $data);
    }

    public function get_prescription_download($id)
    {
        $this->load->helper('download');
        $data['store_images'] = $this->Order_model->get_prescription_file_by_id($id);
        $filename = 'prescription-'.rand(111111, 999999);
        $filepath = 'uploads/prescription/';

        $file = FCPATH.$filepath.$data['store_images']['file'];

        $fname = explode('.', $data['store_images']['file']);
        $extension = end($fname);

        $name = $filename.'.'.$extension;
        $data = file_get_contents($file);
        force_download($name, $data);
    }

    public function genrate_invoice($OrderNO)
    {
        $data['page_title'] = 'Invoice';
        $data['reportdata'] = $this->Order_model->get_order_by_id($this->session->userdata('usercategory'), $OrderNO);
        $data['pharmcydata'] = $this->Order_model->get_store_by_id($this->session->userdata('usercategory'), $data['reportdata']['partner_id']);

        $data['items'] = '';

        if ($this->category == 1) { //Pharmcy
            $data['items'] = $this->Order_model->get_items_by_order_no($this->partner_id, $OrderNO);
        } elseif ($this->category == 2) { // Pathology
            $data['items'] = $this->Order_model->get_test_by_order_no($this->partner_id, $OrderNO);
        } elseif ($this->category == 3) { // Radiology
            $data['items'] = $this->Order_model->get_radiotest_by_order_no($this->partner_id, $OrderNO);
        }

        $data['final_amount'] = $this->Order_model->get_amount_by_order_no($data['reportdata']['partner_id'], $OrderNO);

        $random_no = rand(1111111111, 9999999999).$OrderNO;
        $invoice_name = substr($random_no, -10);

        $data['category_id'] = $this->category;

        $html = $this->load->view('partner/order/invoice', $data, true);

        $pdfFilePath = 'invoice-'.$OrderNO.'.pdf';
        $this->load->library('Pdf');
        $this->pdf->pdf->AddPage('P');
        $this->pdf->pdf->WriteHTML($html);
        $this->load->model('common_model');
        $this->pdf->pdf->Output($pdfFilePath, 'D');
    }
}
