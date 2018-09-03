build:
	@echo "\n--------------> build thrift <--------------\n"
	rm -rf packages/*
	thrift -nowarn --gen php:server -out packages/ sms.thrift
