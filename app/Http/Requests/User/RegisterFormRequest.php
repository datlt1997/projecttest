<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|min:3|max:60',
            'date' => 'required|numeric',
            'month' => 'required|numeric',
            'year' => 'required||numeric',
            'phone' => 'required|numeric',
            'recruitment' =>'required',
            'language' =>'required',
            'technical' =>'required',
            'specialskill' =>'required',
            'achievement' =>'required',
            'sixmonth' =>'required',
            'oneyear' => 'required',
            'threeyear' => 'required',
            'project' => 'required',
            'income' => 'required',
            'email' => 'required|email',
            'filepdf.*' => 'required|mines:pdf'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Bạn quên nhập tên của bạn rồi nè',
            'fullname.min' => 'Bạn dường như đang nhập sai tên của mình',
            'fullname.max' => 'Tên bạn sao dài vậy',
            'date.required' => 'Vui lòng điền ngày sinh của bạn',
            'date.max' => 'Ngày sinh của bạn không đúng',
            'date.numeric' => 'Vui lòng nhập ngày sinh bằng số nhé',
            'month.required' => 'Vui lòng điền tháng sinh của bạn',
            'month.max' => 'Tháng sinh của bạn không đúng',
            'month.numeric' => 'Vui lòng nhập tháng sinh của bạn bằng số',
            'year.required' => 'Vui lòng nhập nhập sinh của bạn',
            'year.min' => 'Vui lòng nhập năm sinh bằng số tronng khoảng 2-4 ký tự',
            'year.max' => 'Vui lòng nhập năm sinh bằng số tronng khoảng 2-4 ký tự',
            'year.numeric' => 'Vui lòng nhập năm sinh bằng số tronng khoảng 2-4 ký tự',
            'phone.required' => 'Vui lòng nhập số điện thoại của bạn',
            'phone.min' => 'Sô điện thoại của bạn bắt đầu từ 10 số',
            'phone.max' => 'Sô điện thoại của bạn không vượt quá 11 số',
            'phone.numeric' => 'Sô điện thoại của bạn phải nhập bằng số',
            'recruitment.required' => 'Vui lòng nhập vị trí ứng tuyển khi vào công ty',
            'language.required' => 'Vui lòng nhập ngôn ngữ lập trình hay vị trị bạn mong muốn',
            'technical.required' => 'Vui lòng nhập kỹ năng chuyên môn',
            'specialskill.required' => 'Vui lòng nhập kỹ năng đặc biệt của bạn',
            'achievement.required' => 'Vui lòng nhập thành tích đạt được của bạn',
            'sixmonth.required' => 'Vui lòng nhập mục tiêu của bạn trong 6 tháng tới',
            'oneyear.required' => 'Vui lòng nhập mục tiêu của bạn trong 1 năm tới',
            'threeyear.required' => 'Vui lòng nhập mục tiêu của bạn trong 3 năm tới',
            'project.required' => 'Vui lòng kể chi tiết đồ án của bạn',
            'income.required' => 'Vui lòng mức lương mong muốn',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Bạn phải điền đúng email',
            'filepdf' => 'Bạn phải gửi kèm CV cho chúng tôi',
        ];
    }
}
