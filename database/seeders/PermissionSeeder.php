<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
/////////////////////////
///

            // تمام سفارشات سایت
            [
                'name'         => 'purchases',
                'description'  => 'تمام خرید ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
////////////////////
///
            // دسته بندی دوره
            [
                'name'         => 'category-courses',
                'description'  => 'دسته بندی های دوره',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-status-courses',
                'description'  => 'تغییر وضعیت دسته بندی دوره',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-delete-courses',
                'description'  => 'حذف موقت دسته بندی دوره',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-trash-courses',
                'description'  => 'سطل زباله دسته بندی دوره',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-create-courses',
                'description'  => 'ایجاد دسته بندی دوره',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-edit-courses',
                'description'  => 'ویرایش دسته بندی دوره',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-restore-courses',
                'description'  => 'بازیابی دسته بندی دوره از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-forceDelete-courses',
                'description'  => 'حذف دائم دسته بندی دوره',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-groupDelete-courses',
                'description'  => 'حذف گروهی دسته بندی دوره',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
//////////////////////
///
            // دسته بندی مقالات
            [
                'name'         => 'category-articles',
                'description'  => 'دسته بندی های مقاله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-status-articles',
                'description'  => 'تغییر وضعیت دسته بندی مقاله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-delete-articles',
                'description'  => 'حذف موقت دسته بندی مقاله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-trash-articles',
                'description'  => 'سطل زباله دسته بندی مقاله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-create-articles',
                'description'  => 'ایجاد دسته بندی مقاله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-edit-articles',
                'description'  => 'ویرایش دسته بندی مقاله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-restore-articles',
                'description'  => 'بازیابی دسته بندی مقاله از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-forceDelete-articles',
                'description'  => 'حذف دائم دسته بندی مقاله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'category-groupDelete-articles',
                'description'  => 'حذف گروهی دسته بندی مقاله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
//////////////////////
///
            //منوی مقالات
            [
                'name'         => 'articles',
                'description'  => 'مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'article-create',
                'description'  => 'ایجاد مقاله جدید',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'article-trash',
                'description'  => 'سطل زباله مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'article-status',
                'description'  => 'تغییر وضعیت مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'article-delete',
                'description'  => 'حذف موقت مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'article-edit',
                'description'  => 'ویرایش مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'article-restore',
                'description'  => 'بازیابی مقالات از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'article-forceDelete',
                'description'  => 'حذف دائم مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'article-groupDelete',
                'description'  => 'حذف گروهی مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
/////////////////////
///
            //برچسب مقالات
            [
                'name'         => 'tags-article',
                'description'  => 'برچسب مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-article-create',
                'description'  => 'ایجاد برچسب مقاله جدید',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-article-trash',
                'description'  => 'سطل زباله برچسب مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-article-status',
                'description'  => 'تغییر وضعیت برچسب مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-article-delete',
                'description'  => 'حذف موقت برچسب مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-article-edit',
                'description'  => 'ویرایش برچسب مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-article-restore',
                'description'  => 'بازیابی برچسب مقالات از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-article-forceDelete',
                'description'  => 'حذف دائم برچسب مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-article-groupDelete',
                'description'  => 'حذف گروهی برچسب مقالات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
/////////////////
///
            //نظرات سایت
            [
                'name'         => 'comments',
                'description'  => 'نظرات سایت',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'comment-trash',
                'description'  => 'سطل زباله نظرات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'comment-status',
                'description'  => 'تغییر وضعیت نظر',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'comment-delete',
                'description'  => 'حذف موقت نظر',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'comment-edit',
                'description'  => 'ویرایش نظر',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
/////////////////
///
            //منوی گزارشات سیستمی
            [
                'name'         => 'system-logs',
                'description'  => 'گزارشات سیستمی',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'crud-logs',
                'description'  => 'گزارش عملیات',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
//////////////////////
///
            //نقش کاربری
            [
                'name'         => 'roles',
                'description'  => 'نقش های کاربری',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'role-create',
                'description'  => 'ایجاد نقش جدید',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'role-trash',
                'description'  => 'سطل زباله نقش ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'role-status',
                'description'  => 'تغییر وضعیت نقش ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'role-permission-view',
                'description'  => 'مشاهده دسترسی نقش ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'role-edit',
                'description'  => 'ویرایش نقش ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'role-delete',
                'description'  => 'حذف موقت نقش ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'role-restore',
                'description'  => 'بازیابی نقش ها از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'role-forceDelete',
                'description'  => 'حذف دائم نقش ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'role-groupDelete',
                'description'  => 'حذف گروهی نقش ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
////////////////////////
///
            //سطح دسترسی
            [
                'name'         => 'permissions',
                'description'  => 'سطح دسترسی ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'permission-create',
                'description'  => 'ایجاد سطح دسترسی جدید',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'permission-trash',
                'description'  => 'سطل زباله سطح دسترسی ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'permission-status',
                'description'  => 'تغییر وضعیت سطح دسترسی ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'permission-delete',
                'description'  => 'حذف موقت سطح دسترسی ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'permission-edit',
                'description'  => 'ویرایش سطح دسترسی ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'permission-restore',
                'description'  => 'بازیابی سطح دسترسی ها از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'permission-forceDelete',
                'description'  => 'حذف دائم سطح دسترسی ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'permission-groupDelete',
                'description'  => 'حذف گروهی سطح دسترسی ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
/////////////////////////
///

            //دوره ها
            [
                'name'         => 'courses',
                'description'  => 'دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'course-create',
                'description'  => 'ایجاد دوره جدید',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'course-trash',
                'description'  => 'سطل زباله دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'course-status',
                'description'  => 'تغییر وضعیت دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'course-delete',
                'description'  => 'حذف موقت دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'course-edit',
                'description'  => 'ویرایش دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'course-restore',
                'description'  => 'بازیابی دوره ها از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'course-forceDelete',
                'description'  => 'حذف دائم دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'course-groupDelete',
                'description'  => 'حذف گروهی دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
/////////////////////////
///

            //سرفصل ها
            [
                'name'         => 'topics',
                'description'  => 'سرفصل ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'topic-create',
                'description'  => 'ایجاد سرفصل جدید',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'topic-trash',
                'description'  => 'سطل زباله سرفصل ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'topic-status',
                'description'  => 'تغییر وضعیت سرفصل ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'topic-delete',
                'description'  => 'حذف موقت سرفصل ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'topic-edit',
                'description'  => 'ویرایش سرفصل ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'topic-restore',
                'description'  => 'بازیابی سرفصل ها از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'topic-forceDelete',
                'description'  => 'حذف دائم سرفصل ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'topic-groupDelete',
                'description'  => 'حذف گروهی سرفصل ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
/////////////////////////
///

            //کلیپ ها
            [
                'name'         => 'episodes',
                'description'  => 'کلیپ های دوره',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'episode-create',
                'description'  => 'ایجاد کلیپ جدید',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'episode-trash',
                'description'  => 'سطل زباله کلیپ ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'episode-status',
                'description'  => 'تغییر وضعیت کلیپ ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'episode-delete',
                'description'  => 'حذف موقت کلیپ ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'episode-edit',
                'description'  => 'ویرایش کلیپ ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'episode-restore',
                'description'  => 'بازیابی کلیپ ها از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'episode-forceDelete',
                'description'  => 'حذف دائم کلیپ ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'episode-groupDelete',
                'description'  => 'حذف گروهی کلیپ ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
/////////////////////////
///

            //برچسب دوره ها
            [
                'name'         => 'tags-course',
                'description'  => 'برچسب دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-course-create',
                'description'  => 'ایجاد برچسب دوره جدید',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-course-trash',
                'description'  => 'سطل زباله برچسب دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-course-status',
                'description'  => 'تغییر وضعیت برچسب دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-course-delete',
                'description'  => 'حذف موقت برچسب دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-course-edit',
                'description'  => 'ویرایش برچسب دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-course-restore',
                'description'  => 'بازیابی برچسب دوره ها از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-course-forceDelete',
                'description'  => 'حذف دائم برچسب دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'tag-course-groupDelete',
                'description'  => 'حذف گروهی برچسب دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
/////////////////////////
///

            //ویژگی دوره ها
            [
                'name'         => 'attributes-course',
                'description'  => 'ویژگی دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'attribute-course-create',
                'description'  => 'ایجاد ویژگی دوره جدید',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'attribute-course-trash',
                'description'  => 'سطل زباله ویژگی دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'attribute-course-filter',
                'description'  => 'تغییر وضعیت فیلتر ویژگی دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'attribute-course-important',
                'description'  => 'تغییر وضعیت مهم ویژگی دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'attribute-course-status',
                'description'  => 'تغییر وضعیت ویژگی دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'attribute-course-delete',
                'description'  => 'حذف موقت ویژگی دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'attribute-course-value',
                'description'  => 'افزودن مقدار برای ویژگی دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'attribute-course-edit',
                'description'  => 'ویرایش ویژگی دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'attribute-course-restore',
                'description'  => 'بازیابی ویژگی دوره ها از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'attribute-course-forceDelete',
                'description'  => 'حذف دائم ویژگی دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'attribute-course-groupDelete',
                'description'  => 'حذف گروهی ویژگی دوره ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
/////////////////////////
///

            //کاربران
            [
                'name'         => 'users',
                'description'  => 'کاربران',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'user-create',
                'description'  => 'ایجاد کاربران جدید',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'user-trash',
                'description'  => 'سطل زباله کاربران',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'user-status',
                'description'  => 'تغییر وضعیت کاربران',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'user-delete',
                'description'  => 'حذف موقت کاربران',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'user-edit',
                'description'  => 'ویرایش کاربران',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'user-restore',
                'description'  => 'بازیابی کاربران از سطل زباله',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'user-forceDelete',
                'description'  => 'حذف دائم کاربران',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'name'         => 'user-groupDelete',
                'description'  => 'حذف گروهی کاربران',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
/////////////////////////
            //تراکنش ها
            [
                'name'         => 'transactions',
                'description'  => 'تراکنش ها',
                'isActive'     => '1',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
/////////////////////////
///

        ]);

    }
}
