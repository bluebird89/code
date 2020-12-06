module helloworld

go 1.14

replace google.golang.org/grpc => github.com/grpc/grpc-go v1.29.1

require (
	google.golang.org/grpc v1.25.1
	rsc.io/quote v1.5.2 // indirect
)
