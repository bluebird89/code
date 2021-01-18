package gen

import "fmt"

type EmployeeList []Employee
type EmployeeToBool func(*Employee) bool
func (al EmployeeList) Filter(f EmployeeToBool) EmployeeList {
	var ret EmployeeList
	for _, a := range al {
		if f(&a) {
			ret = append(ret, a)
		}
	}
	return ret
}

type Employee struct {
	Name     string
	Age      int
	Vacation int
	Salary   int
}
