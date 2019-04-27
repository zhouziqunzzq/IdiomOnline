<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function getFormatted($text = '')
    {
        if (!isset($text) || $text == '')
            $text = $this->content;
        $text = trim($text);
        //Get choices
        $pattern = '/[A-D].[^A-D]+[\s(\r\n)\n]*/';
        $choices = array();
        preg_match_all($pattern, $text, $choices);
        $choices = $choices[0];
        for ($i = 0; $i < count($choices); $i++)
            $choices[$i] = str_replace(PHP_EOL, '', $choices[$i]);
        //Get content
        $content = preg_replace($pattern, '', $text);
        $content = str_replace(PHP_EOL, '', trim($content));
        $temp = explode('.', $content);
        if (count($temp) > 0 && preg_match('/[0-9]*/', $temp[0]) != 0) {
            $content = str_replace($temp[0] . '.', '', $content);
        }
        //return formatted array
        return array(
            'type' => config('question.alias')[intval($this->type) - 1],
            'content' => $content,
            'choices' => $choices,
        );
    }
}
