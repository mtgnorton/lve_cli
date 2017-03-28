<template>
    <section>
        <!--工具条-->
        <el-col :span="24" class="toolbar" style="padding-bottom: 0px;">
            <el-form :inline="true" :model="filters">
                <el-form-item>
                    <el-input v-model="filters.title" placeholder="标题"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" v-on:click="getUsers">查询</el-button>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="handleAdd">新增</el-button>
                </el-form-item>
            </el-form>
        </el-col>

        <!--列表-->
        <el-table :data="articles" highlight-current-row v-loading="listLoading"
            @selection-change="selsChange" style="width: 100%;">
            <el-table-column type="selection" width="55">
            </el-table-column>
            <el-table-column type="index" width="60">
            </el-table-column>

            <el-table-column prop="name" label="用户名" >
            </el-table-column>
            <el-table-column prop="email" label="邮箱" sortable>
            </el-table-column>
            <el-table-column prop="created_at" label="创建时间" >
            </el-table-column>
            <el-table-column label="操作" width="150">
                <template scope="scope">
                    <el-button size="small" @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
                    <el-button type="danger" size="small" @click="handleDel(scope.$index, scope.row)">删除</el-button>
                </template>
            </el-table-column>
        </el-table>


    <el-col :span="24" class="toolbar">
          <el-pagination
            layout="total,prev, pager, next"
            :total="total" :page-size="size"  @current-change="handleCurrentChange" >
          </el-pagination>
    </el-col>


    </section>
</template>

<script>
    import { getListUser } from '../../api/api';
    export default {
        data(){
            return {
                articles: [],
                listLoading: false,
                page: 1,
                total: 0,
                size: 1,
                filters: {
                    title: ''
                }
            }
        },
        methods: {
            // 状态显示转换
            formatStatus: function (row, column) {
                return row.status == 'draft' ? '草稿' : row.status == 'published' ? '已发布' : '未知';
            },
            getUsers() {
                let para = {
                    page:  this.page,
                    title: this.filters.title,
                    size:  this.size
                };
                this.listLoading = true;

                getListUser(para).then((res) => {
                    console.log(res);
                    this.total = res.data.total;
                    console.log(this.total);
                    this.articles = res.data.data;
                    this.listLoading = false;
                });
            },
            handleCurrentChange(val) {
                this.page = val;
                this.getUsers();
            },
            handleAdd(){

            },
            selsChange(){

            }
        },
        mounted() {
            this.getUsers();
        }
    }
</script>
