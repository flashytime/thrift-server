# thrift-server
thrift-server是一个基于swoole实现的php thrift服务，能支持php和java的RPC调用

### server 工作流程

1. 服务端使用swoole启动一个socket监听本地8091端口
2. 接受到客户端的请求后，使用thrift自带的协议解析thrift请求
3. 处理请求
4. 按照thrift的协议返回结果

### 安装软件包

1. thrift
2. composer
3. 执行 `make build`

### 使用supervisor

#### 安装supervisor
```
sudo pip install supervisor
```

#### 生成supervisor配置
```
echo_supervisord_conf > /etc/supervisord.conf
```

#### 配置supervisor
```
[unix_http_server]
file=/tmp/supervisor.sock   ; (the path to the socket file)
chmod=0700                 ; socket file mode (default 0700)

[supervisord]
logfile=/tmp/supervisord.log ; (main log file;default $CWD/supervisord.log)
logfile_maxbytes=50MB        ; (max main logfile bytes b4 rotation;default 50MB)
logfile_backups=10           ; (num of main logfile rotation backups;default 10)
loglevel=info                ; (log level;default info; others: debug,warn,trace)
pidfile=/tmp/supervisord.pid ; (supervisord pidfile;default supervisord.pid)
nodaemon=false               ; (start in foreground if true;default false)
minfds=1024                  ; (min. avail startup file descriptors;default 1024)
minprocs=200                 ; (min. avail process descriptors;default 200)

[supervisorctl]
serverurl=unix:///tmp/supervisor.sock ; use a unix:// URL  for a unix socket

[rpcinterface:supervisor]
supervisor.rpcinterface_factory = supervisor.rpcinterface:make_main_rpcinterface

[include]
files = /etc/supervisor.conf/*.ini
```

#### 配置supervisor 进程
```
[program:sms]
directory = path/to/project/ves
command = php -f start.php
autostart = true
startsecs = 3
autorestart = true
startretries = 5
user = sunlili                      ; 用户必须对directory目录有所有者权限
redirect_stderr = true
stopasgroup = true
stdout_logfile_maxbytes = 20MB
stdout_logfile_backups = 20
stdout_logfile = /var/log/sms_stdout.log   ; 需要先生成日志文件，否则无法启动sms
stderr_logfile = /var/log/sms_stderr.log

```

#### 启动supervisord
```
supervisord -c /etc/supervisord.conf
```

#### supervisorctl 使用

```
# 重启supervisord
 supervisorctl reload
# 查看某个进程的状态
supervisorctl status process_name
# start | stop | upate | reread | restart 进程
# reread 读取有更新（增加）的配置文件，不会启动新添加的程序
# update 启配置文件修改过的程序
supervisorctl start/stop/upate/reread process_name
```
