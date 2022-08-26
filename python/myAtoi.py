class Solution:
    def myAtoi(self, s: str) -> int:
        s = s.lstrip()
        if s == '' or s == '-' or s == '+':
            return 0
        if((not (s[0] == '-' or s[0] == '+')) and (not s[0].isdigit())):
            return 0
        res_str:str = ''
        end:int = 0
        if(s[0] == '-' or s[0] == '+'):
            end = 1
        for i in range(end, len(s)):
            print(s[i])
            if(not s[i].isdigit()):                
                end = i
                break
            else:
                end = i
        if not s[end].isdigit():
            end -= 1
        res_str = s[0:end+1]
        try:
            res = int(res_str)
        except:
            return 0
        if(res < -2147483648):
            res = -2147483648
        if(res > 2147483647):
            res = 2147483647
        return res

if __name__=='__main__':
    sol: Solution = Solution()
    print(sol.myAtoi('+-2'))
